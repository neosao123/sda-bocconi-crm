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
        Schema::create('project_modules', function (Blueprint $table) {
            $table->id('project_module_id');
            $table->string('project_module_title')->nullable();
            $table->bigInteger('project_module_deliverableid')->nullable();
            $table->int('project_module_intern_estimated_time')->nullable();
            $table->int('project_module_junior_estimated_time')->nullable();
            $table->int('project_module_senior_estimated_time')->nullable();
            $table->dateTime('project_module_created')->nullable();
            $table->dateTime('project_module_updated')->nullable();
            $table->integer('project_module_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_modules');
    }
};
