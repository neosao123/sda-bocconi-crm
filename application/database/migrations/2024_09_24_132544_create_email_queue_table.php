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
        Schema::create('email_queue', function (Blueprint $table) {
            $table->integer('emailqueue_id')->autoIncrement();
            $table->dateTime('emailqueue_created'); // Created timestamp
            $table->dateTime('emailqueue_updated'); // Updated timestamp
            $table->string('emailqueue_to', 150)->nullable(); // Recipient email
            $table->string('emailqueue_from_email', 150)->nullable()->comment('optional (used in sending client direct email)'); // Sender email
            $table->string('emailqueue_from_name', 150)->nullable()->comment('optional (used in sending client direct email)'); // Sender name
            $table->string('emailqueue_subject', 250)->nullable(); // Email subject
            $table->text('emailqueue_message')->nullable(); // Email message
            $table->string('emailqueue_type', 150)->default('general')->comment('general|pdf (used for emails that need to generate a pdf)'); // Email type
            $table->text('emailqueue_attachments')->nullable()->comment('json of request(attachments)'); // Attachments
            $table->string('emailqueue_resourcetype', 10)->nullable()->comment('e.g. invoice. Used mainly for deleting records, when resource has been deleted'); // Resource type
            $table->integer('emailqueue_resourceid')->nullable(); // Resource ID
            $table->string('emailqueue_pdf_resource_type', 50)->nullable()->comment('estimate|invoice'); // PDF resource type
            $table->integer('emailqueue_pdf_resource_id')->nullable()->comment('resource id (e.g. estimate id)'); // PDF resource ID
            $table->dateTime('emailqueue_started_at')->nullable()->comment('timestamp of when processing started'); // Processing start timestamp
            $table->string('emailqueue_status', 20)->default('new')->comment('new|processing (set to processing by the cronjob, to avoid duplicate processing)'); // Email status

            // Indexes
            $table->index('emailqueue_type');
            $table->index('emailqueue_resourcetype');
            $table->index('emailqueue_resourceid');
            $table->index('emailqueue_pdf_resource_type');
            $table->index('emailqueue_pdf_resource_id');
            $table->index('emailqueue_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_queue');
    }
};
