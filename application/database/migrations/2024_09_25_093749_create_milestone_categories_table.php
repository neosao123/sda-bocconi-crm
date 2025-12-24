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
        Schema::create('milestone_categories', function (Blueprint $table) {
            $table->id('milestonecategory_id'); // Creates an auto-incrementing primary key
            $table->dateTime('milestonecategory_created');
            $table->dateTime('milestonecategory_updated');
            $table->integer('milestonecategory_creatorid');
            $table->string('milestonecategory_title', 250);
            $table->integer('milestonecategory_position');
            $table->string('milestonecategory_color', 100)->default('default')->comment('default|primary|success|info|warning|danger|lime|brown');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestone_categories');
    }
};
