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
        Schema::create('file_folders', function (Blueprint $table) {
            $table->integer('filefolder_id')->autoIncrement();
            $table->dateTime('filefolder_created');
            $table->dateTime('filefolder_updated');
            $table->integer('filefolder_creatorid')->nullable();
            $table->integer('filefolder_projectid')->nullable();
            $table->string('filefolder_name', 250)->nullable();
            $table->string('filefolder_default', 100)->default('no')->comment('yes|no');
            $table->string('filefolder_system', 100)->default('no')->comment('yes|no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_folders');
    }
};
