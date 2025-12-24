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
        Schema::create('units', function (Blueprint $table) {
            $table->id('unit_id');
            $table->dateTime('unit_created')->nullable();
            $table->dateTime('unit_update')->nullable();
            $table->unsignedBigInteger('unit_creatorid')->default(1);
            $table->string('unit_name', 50);
            $table->string('unit_system_default', 50)->default('no')->comment('yes|no');
            $table->string('unit_time_default', 50)->default('no')->comment('yes|no (used to identify time unit)');

            // Table comment
            $table->comment = '[truncate]';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
