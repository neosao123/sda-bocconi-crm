<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->dateTime('comment_created')->nullable();
            $table->dateTime('comment_updated')->nullable();
            $table->unsignedBigInteger('comment_creatorid');
            $table->unsignedBigInteger('comment_clientid')->nullable()->comment('required for client type resources');
            $table->text('comment_text');
            $table->string('commentresource_type', 50)->comment('[polymorph] project | ticket | task | lead');
            $table->unsignedBigInteger('commentresource_id')->comment('[polymorph] e.g project_id');

            // Indexes
            $table->index('comment_creatorid');
            $table->index('comment_clientid');
            $table->index('commentresource_type');
            $table->index('commentresource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
