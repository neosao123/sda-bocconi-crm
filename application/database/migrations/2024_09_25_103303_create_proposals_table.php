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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('doc_id');
            $table->string('doc_unique_id', 150)->nullable();
            $table->string('doc_template', 150)->nullable()->comment('default');
            $table->dateTime('doc_created');
            $table->dateTime('doc_updated');
            $table->dateTime('doc_date_status_change')->nullable();
            $table->unsignedBigInteger('doc_creatorid')->comment('use ( -1 ) for logged out user.');
            $table->unsignedBigInteger('doc_categoryid')->default(11)->comment('11 is the default category');
            $table->text('doc_heading')->nullable()->comment('e.g. proposal');
            $table->text('doc_heading_color')->nullable();
            $table->text('doc_title')->nullable();
            $table->text('doc_title_color')->nullable();
            $table->text('doc_hero_direcory')->nullable();
            $table->text('doc_hero_filename')->nullable();
            $table->string('doc_hero_updated', 250)->default('no')->comment('ys|no (when no, we use default image path)');
            $table->text('doc_body')->nullable();
            $table->date('doc_date_start')->nullable()->comment('Proposal Issue Date | Contract Start Date');
            $table->date('doc_date_end')->nullable()->comment('Proposal Expiry Date | Contract End Date');
            $table->date('doc_date_published')->nullable();
            $table->dateTime('doc_date_last_emailed')->nullable();
            $table->unsignedBigInteger('doc_client_id')->nullable();
            $table->unsignedBigInteger('doc_project_id')->nullable();
            $table->unsignedBigInteger('doc_lead_id')->nullable();
            $table->text('doc_notes')->nullable();
            $table->string('doc_viewed', 20)->default('no')->comment('yes|no');
            $table->string('doc_type', 150)->nullable()->comment('proposal|contract');
            $table->string('doc_system_type', 150)->default('document')->comment('document|template');
            $table->dateTime('doc_signed_date')->nullable();
            $table->text('doc_signed_first_name')->nullable();
            $table->text('doc_signed_last_name')->nullable();
            $table->text('doc_signed_signature_directory')->nullable();
            $table->text('doc_signed_signature_filename')->nullable();
            $table->text('doc_signed_ip_address')->nullable();
            $table->text('doc_fallback_client_first_name')->nullable()->comment('used for creating events when users are not logged in');
            $table->text('doc_fallback_client_last_name')->nullable()->comment('used for creating events when users are not logged in');
            $table->text('doc_fallback_client_email')->nullable()->comment('used for creating events when users are not logged in');
            $table->string('doc_status', 100)->default('draft')->comment('draft|new|accepted|declined|revised|expired');
            $table->string('proposal_automation_status', 20)->default('disabled')->comment('enabled|disabled');
            $table->string('docresource_type', 100)->nullable()->comment('client|lead');
            $table->unsignedBigInteger('docresource_id')->nullable();
            $table->string('proposal_automation_create_project', 10)->default('no')->comment('yes|no');
            $table->text('proposal_automation_project_title')->nullable();
            $table->string('proposal_automation_project_status', 30)->default('in_progress')->comment('not_started | in_progress | on_hold');
            $table->string('proposal_automation_create_tasks', 10)->default('no')->comment('yes|no');
            $table->string('proposal_automation_project_email_client', 10)->default('no')->comment('yes|no');
            $table->string('proposal_automation_create_invoice', 10)->default('no')->comment('yes|no');
            $table->integer('proposal_automation_invoice_due_date')->nullable();
            $table->string('proposal_automation_invoice_email_client', 10)->default('no')->comment('yes|no');
            $table->unsignedBigInteger('proposal_automation_log_created_project_id')->nullable();
            $table->unsignedBigInteger('proposal_automation_log_created_invoice_id')->nullable();
            $table->string('doc_publishing_type', 20)->default('instant')->comment('instant|scheduled');
            $table->dateTime('doc_publishing_scheduled_date')->nullable();
            $table->text('doc_publishing_scheduled_status')->nullable()->comment('pending|published|failed');
            $table->text('doc_publishing_scheduled_log')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
