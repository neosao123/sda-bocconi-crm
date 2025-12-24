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
        Schema::create('tasks_dependencies', function (Blueprint $table) {
            $table->id('tasksdependency_id');
            $table->integer('tasksdependency_created')->unsigned();
            $table->integer('tasksdependency_updated')->unsigned();
            $table->integer('tasksdependency_creatorid')->unsigned()->nullable();
            $table->integer('tasksdependency_projectid')->unsigned()->nullable();
            $table->integer('tasksdependency_clientid')->unsigned()->nullable();
            $table->integer('tasksdependency_taskid')->unsigned()->nullable();
            $table->integer('tasksdependency_blockerid')->unsigned()->nullable();
            $table->string('tasksdependency_type', 100)->nullable()->comment('cannot_complete|cannot_start');
            $table->string('tasksdependency_status', 100)->default('active')->comment('active|fulfilled');

            // Indexes
            $table->index('tasksdependency_projectid');
            $table->index('tasksdependency_clientid');
            $table->index('tasksdependency_taskid');
            $table->index('tasksdependency_blockerid');
            $table->index('tasksdependency_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_dependencies');
    }
};
