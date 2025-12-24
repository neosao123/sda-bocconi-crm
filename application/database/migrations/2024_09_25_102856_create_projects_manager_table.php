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
        Schema::create('projects_manager', function (Blueprint $table) {
            $table->id('projectsmanager_id');
            $table->dateTime('projectsmanager_created');
            $table->dateTime('projectsmanager_updated');
            $table->unsignedBigInteger('projectsmanager_projectid')->nullable();
            $table->unsignedBigInteger('projectsmanager_userid');

            // Indexes
            $table->index('projectsmanager_userid');
            $table->index('projectsmanager_projectid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_manager');
    }
};
