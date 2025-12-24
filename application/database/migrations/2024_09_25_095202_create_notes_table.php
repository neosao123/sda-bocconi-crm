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
        Schema::create('notes', function (Blueprint $table) {
            $table->id('note_id'); // AUTO_INCREMENT
            $table->dateTime('note_created')->nullable()->comment('always now()');
            $table->dateTime('note_updated')->nullable();
            $table->integer('note_creatorid')->nullable();
            $table->string('note_title', 250)->nullable();
            $table->text('note_description')->nullable();
            $table->string('note_visibility', 30)->default('public')->comment('private|public');
            $table->string('noteresource_type', 50)->nullable()->comment('[polymorph] client | project | user | lead');
            $table->integer('noteresource_id')->nullable()->comment('[polymorph] e.g project_id');

            // Keys
            $table->index('note_creatorid');
            $table->index('noteresource_type');
            $table->index('noteresource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
