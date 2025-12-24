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
        Schema::create('tech_stacks', function (Blueprint $table) {
            $table->id('tech_stack_id');
            $table->string('tech_stack_title')->nullable();
            $table->dateTime('tech_stack_created')->nullable();
            $table->dateTime('tech_stack_updated')->nullable();
            $table->integer('tech_stack_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_stacks');
    }
};
