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
        Schema::create('tasks_status', function (Blueprint $table) {
            $table->id('taskstatus_id'); // Auto-incrementing ID
            $table->dateTime('taskstatus_created')->nullable(); // Creation timestamp
            $table->integer('taskstatus_creatorid')->nullable(); // Creator ID
            $table->dateTime('taskstatus_updated')->nullable(); // Update timestamp
            $table->string('taskstatus_title', 200); // Title of the status
            $table->integer('taskstatus_position'); // Position of the status
            $table->string('taskstatus_color', 100)->default('default') // Color of the status
                ->comment('default|primary|success|info|warning|danger|lime|brown');
            $table->string('taskstatus_system_default', 10)->default('no') // System default flag
                ->comment('yes | no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_status');
    }
};
