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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->string('emailtemplate_module_unique_id', 250)->nullable(); // Unique ID for the module
            $table->string('emailtemplate_module_name', 250)->nullable(); // Module name
            $table->string('emailtemplate_name', 100)->nullable(); // Template name
            $table->string('emailtemplate_lang', 250)->nullable()->comment('to match to language'); // Language
            $table->string('emailtemplate_type', 30)->nullable()->comment('everyone|admin|client'); // Template type
            $table->string('emailtemplate_category', 30)->nullable()->comment('modules|users|projects|tasks|leads|tickets|billing|estimates|other'); // Template category
            $table->string('emailtemplate_subject', 250)->nullable(); // Email subject
            $table->text('emailtemplate_body')->nullable(); // Email body
            $table->text('emailtemplate_variables')->nullable(); // Email variables
            $table->dateTime('emailtemplate_created')->nullable(); // Created timestamp
            $table->dateTime('emailtemplate_updated')->nullable(); // Updated timestamp
            $table->string('emailtemplate_status', 20)->default('enabled')->comment('enabled|disabled'); // Status
            $table->string('emailtemplate_language', 50)->nullable(); // Language
            $table->string('emailtemplate_real_template', 50)->default('yes')->comment('yes|no'); // Real template
            $table->string('emailtemplate_show_enabled', 50)->default('yes')->comment('yes|no'); // Show enabled

            // Primary Key
            $table->id('emailtemplate_id'); // Auto-incrementing ID

            // Indexes
            $table->index('emailtemplate_type');
            $table->index('emailtemplate_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};
