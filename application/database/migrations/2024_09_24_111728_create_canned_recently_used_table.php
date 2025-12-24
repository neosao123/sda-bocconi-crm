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
        Schema::create('canned_recently_used', function (Blueprint $table) {
            $table->id('cannedrecent_id'); // Primary key with auto-increment
            $table->dateTime('cannedrecent_created'); // Non-nullable datetime field
            $table->dateTime('cannedrecent_updated'); // Non-nullable datetime field
            $table->unsignedBigInteger('cannedrecent_userid'); // Foreign key (non-nullable)
            $table->unsignedBigInteger('cannedrecent_cannedid'); // Foreign key (non-nullable)

            // Indexes
            $table->index('cannedrecent_userid');

            // Optionally, define foreign keys for referential integrity
            // $table->foreign('cannedrecent_userid')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('cannedrecent_cannedid')->references('canned_id')->on('canned')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canned_recently_used');
    }
};
