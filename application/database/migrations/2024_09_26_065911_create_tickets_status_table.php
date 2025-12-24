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
        Schema::create('tickets_status', function (Blueprint $table) {
            $table->id('ticketstatus_id');
            $table->dateTime('ticketstatus_created')->nullable();
            $table->integer('ticketstatus_creatorid')->nullable();
            $table->dateTime('ticketstatus_updated')->nullable();
            $table->string('ticketstatus_title', 200);
            $table->integer('ticketstatus_position');
            $table->string('ticketstatus_color', 100)->default('default')->comment('default|primary|success|info|warning|danger|lime|brown');
            $table->string('ticketstatus_use_for_client_replied', 10)->default('no');
            $table->string('ticketstatus_use_for_team_replied', 10)->default('no');
            $table->string('ticketstatus_system_default', 10)->default('no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_status');
    }
};
