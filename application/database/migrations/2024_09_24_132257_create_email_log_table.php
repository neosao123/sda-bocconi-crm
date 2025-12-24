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
        Schema::create('email_log', function (Blueprint $table) {
            $table->integer('emaillog_id')->autoIncrement(); // Auto-incrementing ID
            $table->dateTime('emaillog_created')->nullable(); // Created timestamp
            $table->dateTime('emaillog_updated')->nullable(); // Updated timestamp
            $table->string('emaillog_email', 100)->nullable(); // Email address
            $table->string('emaillog_subject', 200)->nullable(); // Email subject
            $table->text('emaillog_body')->nullable(); // Email body
            $table->string('emaillog_attachment', 250)->default('attached file name'); // Attachment filename
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_log');
    }
};
