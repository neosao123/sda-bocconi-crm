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
        Schema::create('webforms_assigned', function (Blueprint $table) {
            $table->id('webformassigned_id'); // This creates an auto-incrementing primary key
            $table->dateTime('webformassigned_created');
            $table->dateTime('webformassigned_updated');
            $table->unsignedBigInteger('webformassigned_formid')->nullable(); // Use unsignedBigInteger if referencing the `webforms` table's ID
            $table->unsignedBigInteger('webformassigned_userid')->nullable(); // Use unsignedBigInteger if referencing a `users` table's ID

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webforms_assigned');
    }
};
