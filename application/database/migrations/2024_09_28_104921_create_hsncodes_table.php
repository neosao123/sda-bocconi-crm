<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsncodes', function (Blueprint $table) {
            $table->id('hsncode_id'); // Creates an auto-incrementing primary key
            $table->string('hsncode_uniqueid', 244)->nullable(); // Unique ID
            $table->dateTime('hsncode_created')->nullable(); // Creation timestamp
            $table->dateTime('hsncode_updated')->nullable(); // Update timestamp
            $table->string('hsncode_number', 255)->nullable(); // HSN code number
            $table->integer('hsncode_creatorid')->default(0); // Creator ID
            $table->string('hsncode_slug', 255)->nullable(); // Slug
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hsncodes');
    }
};
