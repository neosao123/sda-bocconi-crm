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
        Schema::create('files', function (Blueprint $table) {
            $table->increments('file_id');
            $table->string('file_uniqueid', 100)->nullable();
            $table->string('file_upload_unique_key', 100)->nullable()->comment('used to identify files that were uploaded in one go');
            $table->dateTime('file_created')->nullable();
            $table->dateTime('file_updated')->nullable();
            $table->integer('file_creatorid')->nullable();
            $table->integer('file_clientid')->nullable()->comment('optional');
            $table->integer('file_folderid')->nullable();
            $table->string('file_filename', 250)->nullable();
            $table->string('file_directory', 100)->nullable();
            $table->string('file_extension', 10)->nullable();
            $table->string('file_size', 40)->nullable()->comment('human readable file size');
            $table->string('file_type', 20)->nullable()->comment('image|file');
            $table->string('file_thumbname', 250)->nullable()->comment('optional');
            $table->string('file_visibility_client', 5)->default('yes')->comment('yes | no');
            $table->string('fileresource_type', 50)->nullable()->comment('[polymorph] project');
            $table->integer('fileresource_id')->nullable()->comment('[polymorph] e.g project_id');

            // Define indexes
            $table->index('file_creatorid');
            $table->index('file_clientid');
            $table->index('fileresource_type');
            $table->index('fileresource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
