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
        Schema::create('leads', function (Blueprint $table) {
            $table->id('lead_id'); // auto-incrementing ID
            $table->string('lead_uniqueid', 100)->nullable();
            $table->string('lead_importid', 100)->nullable();
            $table->double('lead_position');
            $table->dateTime('lead_created')->nullable();
            $table->dateTime('lead_updated')->nullable();
            $table->dateTime('lead_date_status_change')->nullable();
            $table->integer('lead_creatorid')->nullable();
            $table->integer('lead_updatorid')->nullable();
            $table->integer('lead_categoryid')->default(3);
            $table->string('lead_firstname', 100)->nullable();
            $table->string('lead_lastname', 100)->nullable();
            $table->string('lead_email', 150)->nullable();
            $table->string('lead_phone', 150)->nullable();
            $table->string('lead_job_position', 150)->nullable();
            $table->string('lead_company_name', 150)->nullable();
            $table->string('lead_website', 150)->nullable();
            $table->string('lead_vat', 50)->nullable();
            $table->string('lead_street', 150)->nullable();
            $table->string('lead_city', 150)->nullable();
            $table->string('lead_state', 150)->nullable();
            $table->string('lead_zip', 150)->nullable();
            $table->string('lead_country', 150)->nullable();
            $table->string('lead_source', 150)->nullable();
            $table->string('lead_type', 150)->nullable()->default('inhouse')->comment('inhouse|associate');
            $table->string('lead_input_source', 20)->default('app')->comment('app|webform');
            $table->text('lead_input_ip_address')->nullable();
            $table->string('lead_title', 250)->nullable();
            $table->text('lead_description')->nullable();
            $table->decimal('lead_value', 10, 2)->nullable();
            $table->date('lead_last_contacted')->nullable();
            $table->string('lead_converted', 10)->default('no')->comment('yes|no');
            $table->integer('lead_converted_by_userid')->nullable()->comment('id of user who converted');
            $table->dateTime('lead_converted_date')->nullable()->comment('date lead converted');
            $table->integer('lead_converted_clientid')->nullable()->comment('if the lead has previously been converted to a client');
            $table->tinyInteger('lead_status')->default(1)->comment('Default is id: 1 (leads_status) table');
            $table->string('lead_active_state', 10)->default('active')->comment('active|archived');
            $table->string('lead_visibility', 40)->default('visible')->comment('visible|hidden (used to prevent tasks that are still being cloned from showing in tasks list)');
            $table->string('lead_cover_image', 10)->default('no')->comment('yes|no');
            $table->text('lead_cover_image_uniqueid')->nullable();
            $table->text('lead_cover_image_filename')->nullable();

            // Custom fields
            for ($i = 1; $i <= 150; $i++) {
                if ($i >= 1 && $i <= 30) {
                    $table->tinyText("lead_custom_field_{$i}")->nullable();
                } elseif ($i >= 31 && $i <= 40) {
                    $table->dateTime("lead_custom_field_{$i}")->nullable();
                } elseif ($i >= 41 && $i <= 110) {
                    $table->text("lead_custom_field_{$i}")->nullable();
                } elseif ($i >= 111 && $i <= 130) {
                    $table->integer("lead_custom_field_{$i}")->nullable();
                } else {
                    $table->decimal("lead_custom_field_{$i}", 10, 2)->nullable();
                }
            }

            // Indexes
            $table->index('lead_creatorid');
            $table->index('lead_categoryid');
            $table->index('lead_email');
            $table->index('lead_status');
            $table->index('lead_converted_clientid');
            $table->index('lead_active_state');
            $table->index('lead_visibility');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
