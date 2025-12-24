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
        Schema::create('leads_sources', function (Blueprint $table) {
            $table->increments('leadsources_id'); // Auto-increment primary key
            $table->dateTime('leadsources_created'); // Creation timestamp
            $table->dateTime('leadsources_updated'); // Update timestamp
            $table->integer('leadsources_creatorid'); // Creator ID
            $table->string('leadsources_title', 200)->comment('[do not truncate] - good to have example sources like Google'); // Title with comment
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads_sources');
    }
};
