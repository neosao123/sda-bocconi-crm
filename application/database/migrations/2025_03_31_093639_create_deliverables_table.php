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
        Schema::create('deliverables', function (Blueprint $table) {
            $table->id('deliverable_id');
            $table->string('deliverable_title')->nullable();
            $table->dateTime('deliverable_created')->nullable();
            $table->dateTime('deliverable_updated')->nullable();
            $table->integer('deliverable_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliverables');
    }
};
