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
        Schema::create('messages', function (Blueprint $table) {
            $table->integer('message_id')->autoIncrement();
            $table->string('message_unique_id', 100);
            $table->dateTime('message_created');
            $table->dateTime('message_updated');
            $table->integer('message_timestamp');
            $table->integer('message_creatorid');
            $table->string('message_source', 150)->comment('sender unique id');
            $table->string('message_target', 150)->comment('receivers unique id');
            $table->string('message_creator_uniqueid', 150)->nullable();
            $table->string('message_target_uniqueid', 150)->nullable();
            $table->text('message_text')->nullable();
            $table->string('message_file_name', 250)->nullable();
            $table->string('message_file_directory', 150)->nullable();
            $table->string('message_file_thumb_name', 150)->nullable();
            $table->string('message_file_type', 50)->nullable()->comment('file | image');
            $table->string('message_type', 150)->default('file')->comment('text | file');
            $table->string('message_status', 150)->default('unread')->comment('read | unread');


            // Indexes
            $table->index('message_status');
            $table->index('message_creatorid');
            $table->index('message_creator_uniqueid');
            $table->index('message_target_uniqueid');
            $table->index('message_type');
            $table->index('message_source');
            $table->index('message_target');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
