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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id('checklist_id'); // AUTO_INCREMENT primary key
            $table->integer('checklist_position'); // Position of the checklist item
            $table->dateTime('checklist_created'); // Creation timestamp
            $table->dateTime('checklist_updated'); // Update timestamp
            $table->integer('checklist_creatorid'); // ID of the user who created the checklist
            $table->integer('checklist_clientid')->nullable(); // ID of the client (nullable)
            $table->text('checklist_text'); // Text of the checklist item
            $table->string('checklist_status', 250)->default('pending') // Status of the checklist item
                ->comment('pending | completed');
            $table->string('checklistresource_type', 50); // Type of the resource related to the checklist
            $table->integer('checklistresource_id'); // ID of the resource related to the checklist

            // Defining indexes
            $table->index('checklistresource_type');
            $table->index('checklistresource_id');
            $table->index('checklist_creatorid');
            $table->index('checklist_clientid');
            $table->index('checklist_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
