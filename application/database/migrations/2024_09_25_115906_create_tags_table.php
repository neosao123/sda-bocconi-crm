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
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tag_id'); // AUTO_INCREMENT primary key
            $table->dateTime('tag_created')->nullable(); // Custom created timestamp
            $table->dateTime('tag_updated')->nullable(); // Custom updated timestamp
            $table->integer('tag_creatorid')->nullable(); // Creator ID
            $table->string('tag_title', 100); // Tag title
            $table->string('tag_visibility', 50)->default('user')
                ->comment('public | user (public tags are only created via admin settings)'); // Visibility
            $table->string('tagresource_type', 50)
                ->comment('[polymorph] invoice | project | client | lead | task | estimate | ticket | contract | note | subscription | contract | proposal'); // Polymorphic resource type
            $table->integer('tagresource_id'); // Polymorphic resource ID

            // Indexes
            $table->index('tag_creatorid'); // Index on creator ID
            $table->index('tagresource_type'); // Index on resource type
            $table->index('tag_visibility'); // Index on visibility
            $table->index('tagresource_id'); // Index on resource ID
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
