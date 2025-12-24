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
        Schema::create('kb_categories', function (Blueprint $table) {
            $table->integer('kbcategory_id')->autoIncrement();
            $table->dateTime('kbcategory_created');
            $table->dateTime('kbcategory_updated');
            $table->integer('kbcategory_creatorid');
            $table->string('kbcategory_title', 250);
            $table->text('kbcategory_description')->nullable();
            $table->integer('kbcategory_position')->nullable();
            $table->string('kbcategory_visibility', 50)->default('everyone')->comment('everyone | team | client');
            $table->string('kbcategory_slug', 250)->nullable();
            $table->string('kbcategory_icon', 250)->nullable();
            $table->string('kbcategory_type', 50)->default('text')->comment('text|video');
            $table->string('kbcategory_system_default', 250)->default('no')->comment('yes | no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kb_categories');
    }
};
