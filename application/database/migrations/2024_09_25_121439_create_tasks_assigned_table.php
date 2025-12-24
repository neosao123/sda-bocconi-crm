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
        Schema::create('tasks_assigned', function (Blueprint $table) {
            $table->id('tasksassigned_id')->comment('[truncate]');
            $table->integer('tasksassigned_taskid')->unsigned();
            $table->integer('tasksassigned_userid')->unsigned()->nullable();
            $table->dateTime('tasksassigned_created')->nullable();
            $table->dateTime('tasksassigned_updated')->nullable();

            // Indexes
            $table->index('tasksassigned_taskid');
            $table->index('tasksassigned_userid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_assigned');
    }
};
