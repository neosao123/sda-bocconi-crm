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
        Schema::create('product_tasks_dependencies', function (Blueprint $table) {
            $table->id('product_task_dependency_id'); // AUTO_INCREMENT
            $table->date('product_task_dependency_created')->nullable(false);
            $table->date('product_task_dependency_updated')->nullable(false);
            $table->integer('product_task_dependency_taskid')->nullable();
            $table->integer('product_task_dependency_blockerid')->nullable();
            $table->string('product_task_dependency_type', 100)
                ->nullable()
                ->comment('cannot_complete|cannot_start');

            // Indexes
            $table->index('product_task_dependency_taskid', 'ptd_taskid_idx');
            $table->index('product_task_dependency_blockerid', 'ptd_blockerid_idx');
            $table->index('product_task_dependency_type', 'ptd_type_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_tasks_dependencies');
    }
};
