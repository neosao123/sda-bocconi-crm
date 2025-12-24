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
        Schema::create('category_users', function (Blueprint $table) {
            $table->id('categoryuser_id'); // AUTO_INCREMENT primary key
            $table->integer('categoryuser_categoryid'); // Foreign key for category
            $table->integer('categoryuser_userid'); // Foreign key for user
            $table->dateTime('categoryuser_created'); // Creation timestamp
            $table->dateTime('categoryuser_updated'); // Update timestamp
            $table->timestamps(); // Optional: Laravel timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_users');
    }
};
