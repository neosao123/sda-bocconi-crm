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
        Schema::create('projects_assigned', function (Blueprint $table) {
            $table->id('projectsassigned_id')->comment('[truncate]');
            $table->unsignedBigInteger('projectsassigned_projectid')->nullable();
            $table->unsignedBigInteger('projectsassigned_userid')->nullable();
            $table->dateTime('projectsassigned_created')->nullable();
            $table->dateTime('projectsassigned_updated')->nullable();

            $table->index('projectsassigned_projectid');
            $table->index('projectsassigned_userid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_assigned');
    }
};
