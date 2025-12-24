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
        Schema::create('leads_status', function (Blueprint $table) {
            $table->increments('leadstatus_id'); // Auto-increment primary key
            $table->dateTime('leadstatus_created')->nullable(); // Creation timestamp
            $table->integer('leadstatus_creatorid')->nullable(); // Creator ID
            $table->dateTime('leadstatus_updated')->nullable(); // Update timestamp
            $table->string('leadstatus_title', 200); // Title
            $table->integer('leadstatus_position'); // Position
            $table->string('leadstatus_color', 100)->default('default')->comment('default|primary|success|info|warning|danger|lime|brown'); // Color with default value
            $table->string('leadstatus_system_default', 10)->default('no')->comment('yes | no'); // System default indicator
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads_status');
    }
};
