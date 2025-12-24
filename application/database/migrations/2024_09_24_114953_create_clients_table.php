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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id'); // AUTO_INCREMENT primary key
            $table->string('client_importid', 100)->nullable(); // Import ID
            $table->dateTime('client_created')->nullable(); // Creation timestamp
            $table->dateTime('client_updated')->nullable(); // Update timestamp
            $table->integer('client_creatorid'); // ID of the user who created the client
            $table->integer('client_created_from_leadid'); // ID of the lead the client was created from
            $table->integer('client_categoryid')->default(2); // Default category ID
            $table->string('client_company_name', 150); // Company name
            $table->text('client_description')->nullable(); // Client description
            $table->string('client_phone', 50)->nullable(); // Phone number
            $table->string('client_logo_folder', 50)->nullable(); // Logo folder
            $table->string('client_logo_filename', 50)->nullable(); // Logo filename
            $table->string('client_website', 250)->nullable(); // Website URL
            $table->string('client_vat', 50)->nullable(); // VAT number
            $table->string('client_billing_street', 200)->nullable(); // Billing street
            $table->string('client_billing_city', 100)->nullable(); // Billing city
            $table->string('client_billing_state', 100)->nullable(); // Billing state
            $table->string('client_billing_zip', 50)->nullable(); // Billing zip
            $table->string('client_billing_country', 100)->nullable(); // Billing country
            $table->string('client_shipping_street', 250)->nullable(); // Shipping street
            $table->string('client_shipping_city', 100)->nullable(); // Shipping city
            $table->string('client_shipping_state', 100)->nullable(); // Shipping state
            $table->string('client_shipping_zip', 50)->nullable(); // Shipping zip
            $table->string('client_shipping_country', 100)->nullable(); // Shipping country
            $table->string('client_status', 50)->default('active')->comment('active|suspended'); // Status
            $table->string('client_app_modules', 50)->default('system')->nullable()->comment('system|custom'); // App modules
            $table->string('client_settings_modules_projects', 50)->default('enabled')->comment('enabled|disabled'); // Project settings
            $table->string('client_settings_modules_invoices', 50)->default('enabled')->comment('enabled|disabled'); // Invoice settings
            $table->string('client_settings_modules_payments', 50)->default('enabled')->comment('enabled|disabled'); // Payment settings
            $table->string('client_settings_modules_knowledgebase', 50)->default('enabled')->comment('enabled|disabled'); // Knowledgebase settings
            $table->string('client_settings_modules_estimates', 50)->default('enabled')->comment('enabled|disabled'); // Estimate settings
            $table->string('client_settings_modules_subscriptions', 50)->default('enabled')->comment('enabled|disabled'); // Subscription settings
            $table->string('client_settings_modules_tickets', 50)->default('enabled')->comment('enabled|disabled'); // Ticket settings
            $table->string('client_import_first_name', 100)->nullable()->comment('used during import'); // First name during import
            $table->string('client_import_last_name', 100)->nullable()->comment('used during import'); // Last name during import
            $table->string('client_import_email', 100)->nullable()->comment('used during import'); // Email during import
            $table->string('client_import_job_title', 100)->nullable()->comment('used during import'); // Job title during import

            // Custom fields
            for ($i = 1; $i <= 70; $i++) {
                if ($i <= 10) {
                    $table->tinyText("client_custom_field_$i")->nullable();
                } elseif ($i <= 30) {
                    $table->text("client_custom_field_$i")->nullable();
                } elseif ($i <= 40) {
                    $table->string("client_custom_field_$i", 20)->nullable();
                } elseif ($i <= 60) {
                    $table->integer("client_custom_field_$i")->nullable();
                } else {
                    $table->decimal("client_custom_field_$i", 10, 2)->nullable();
                }
            }

            $table->text('client_billing_invoice_terms')->nullable(); // Billing invoice terms
            $table->smallInteger('client_billing_invoice_due_days')->nullable(); // Invoice due days

            // Defining indexes
            $table->index('client_creatorid');
            $table->index('client_categoryid');
            $table->index('client_status');
            $table->index('client_created_from_leadid');
            $table->index('client_app_modules');
            $table->index('client_importid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
