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
        Schema::create('canned', function (Blueprint $table) {
            $table->id('canned_id'); // Primary key with auto-increment
            $table->dateTime('canned_created'); // Non-nullable datetime field
            $table->dateTime('canned_updated'); // Non-nullable datetime field
            $table->integer('canned_creatorid')->nullable(); // Foreign key (nullable)
            $table->integer('canned_categoryid')->nullable(); // Foreign key (nullable)
            $table->string('canned_title', 250)->nullable(); // Canned title
            $table->text('canned_message')->nullable(); // Canned message
            $table->string('canned_visibility', 20)
                ->default('public')
                ->comment('public|private'); // Visibility with default 'public'

            // Indices
            $table->index('canned_categoryid');
            $table->index('canned_creatorid');
            $table->index('canned_visibility');

            // Optionally, you can define foreign keys for referential integrity
            // $table->foreign('canned_categoryid')->references('id')->on('categories')->onDelete('set null');
            // $table->foreign('canned_creatorid')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canned');
    }
};
