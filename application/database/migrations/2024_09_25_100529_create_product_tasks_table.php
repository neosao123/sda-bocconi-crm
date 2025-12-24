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
        Schema::create('product_tasks', function (Blueprint $table) {
            $table->id('product_task_id'); // AUTO_INCREMENT
            $table->date('product_task_created')->nullable(false);
            $table->date('product_task_updated')->nullable(false);
            $table->integer('product_task_creatorid')->nullable();
            $table->integer('product_task_itemid')->nullable();
            $table->string('product_task_title', 250)->nullable();
            $table->text('product_task_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_tasks');
    }
};
