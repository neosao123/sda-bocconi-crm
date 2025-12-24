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
        Schema::create('tasks_priority', function (Blueprint $table) {
            $table->id('taskpriority_id');
            $table->dateTime('taskpriority_created')->nullable();
            $table->integer('taskpriority_creatorid')->nullable();
            $table->dateTime('taskpriority_updated')->nullable();
            $table->string('taskpriority_title', 200);
            $table->integer('taskpriority_position');
            $table->string('taskpriority_color', 100)->default('default')->comment('default|primary|success|info|warning|danger|lime|brown');
            $table->string('taskpriority_system_default', 10)->default('no')->comment('yes | no');

            // Indexes
            $table->index('taskpriority_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_priority');
    }
};
