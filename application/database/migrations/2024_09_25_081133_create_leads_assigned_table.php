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
        Schema::create('leads_assigned', function (Blueprint $table) {
            $table->id('leadsassigned_id'); // Primary Key
            $table->unsignedBigInteger('leadsassigned_leadid')->nullable(); // Foreign Key to leads
            $table->unsignedBigInteger('leadsassigned_userid')->nullable(); // Foreign Key to users
            $table->dateTime('leadsassigned_created'); // Creation timestamp
            $table->dateTime('leadsassigned_updated'); // Update timestamp
            $table->string('leadsassigned_leadtype')->nullable();

            // Indexes
            $table->index('leadsassigned_userid');
            $table->index('leadsassigned_leadid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads_assigned');
    }
};
