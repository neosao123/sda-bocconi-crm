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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('doc_id');
            $table->string('doc_unique_id', 150)->nullable();
            $table->string('doc_template', 150)->nullable()->comment('default');
            $table->dateTime('doc_created');
            $table->dateTime('doc_updated');
            $table->dateTime('doc_date_status_change');
            $table->integer('doc_creatorid')->comment('use ( -1 ) for logged out user.');
            $table->integer('doc_categoryid')->default(11)->comment('11 is the default category');
            $table->string('doc_heading', 250)->default('#7493a9')->comment('e.g. contract');
            $table->string('doc_heading_color', 30)->default('#7493a9');
            $table->string('doc_title', 250)->nullable();
            $table->string('doc_title_color', 30)->nullable();
            $table->string('doc_hero_direcory', 250)->nullable();
            $table->string('doc_hero_filename', 250)->nullable();
            $table->string('doc_hero_updated', 250)->default('no')->comment('yes|no (when no, we use default image path)');
            $table->text('doc_body')->nullable();
            $table->date('doc_date_start')->nullable()->comment('Proposal Issue Date | Contract Start Date');
            $table->date('doc_date_end')->nullable()->comment('Proposal Expiry Date | Contract End Date');
            $table->date('doc_date_published')->nullable();
            $table->dateTime('doc_date_last_emailed')->nullable();
            $table->decimal('doc_value', 10, 2)->nullable();
            $table->integer('doc_client_id')->nullable();
            $table->integer('doc_project_id')->nullable();
            $table->integer('doc_lead_id')->nullable();
            $table->text('doc_notes')->nullable();
            $table->string('doc_viewed', 20)->default('no')->comment('yes|no');
            $table->string('doc_type', 150)->default('contract');
            $table->string('doc_system_type', 150)->default('document')->comment('document|template');
            $table->integer('doc_provider_signed_userid')->nullable();
            $table->dateTime('doc_provider_signed_date')->nullable();
            $table->string('doc_provider_signed_first_name', 150)->nullable();
            $table->string('doc_provider_signed_last_name', 150)->nullable();
            $table->string('doc_provider_signed_signature_directory', 150)->nullable();
            $table->string('doc_provider_signed_signature_filename', 150)->nullable();
            $table->string('doc_provider_signed_ip_address', 150)->nullable();
            $table->string('doc_provider_signed_status', 50)->default('unsigned')->comment('signed|unsigned');
            $table->integer('doc_signed_userid')->nullable();
            $table->dateTime('doc_signed_date')->nullable();
            $table->string('doc_signed_first_name', 150)->default('');
            $table->string('doc_signed_last_name', 150)->default('');
            $table->string('doc_signed_signature_directory', 150)->default('');
            $table->string('doc_signed_signature_filename', 150)->default('');
            $table->string('doc_signed_status', 50)->default('unsigned')->comment('signed|unsigned');
            $table->string('doc_signed_ip_address', 150)->nullable();
            $table->string('doc_fallback_client_first_name', 150)->default('')->comment('used for creating events when users are not logged in');
            $table->string('doc_fallback_client_last_name', 150)->default('')->comment('used for creating events when users are not logged in');
            $table->string('doc_fallback_client_email', 150)->default('')->comment('used for creating events when users are not logged in');
            $table->string('doc_status', 100)->default('draft')->comment('draft|awaiting_signatures|active|expired');
            $table->string('docresource_type', 100)->nullable()->comment('client|lead');
            $table->integer('docresource_id')->nullable();
            $table->string('doc_publishing_type', 20)->default('instant')->comment('instant|scheduled');
            $table->dateTime('doc_publishing_scheduled_date')->nullable();
            $table->text('doc_publishing_scheduled_status')->nullable()->comment('pending|published|failed');
            $table->text('doc_publishing_scheduled_log')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
