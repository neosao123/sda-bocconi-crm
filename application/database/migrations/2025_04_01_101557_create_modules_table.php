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
        Schema::create('modules', function (Blueprint $table) {
            $table->id('module_id');
            $table->string('module_title')->nullable();
            $table->string('module_deliverableid')->nullable();
            $table->dateTime('module_created')->nullable();
            $table->dateTime('module_updated')->nullable();
            $table->integer('module_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
