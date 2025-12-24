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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id'); // AUTO_INCREMENT is handled by Laravel
            $table->dateTime('role_created')->nullable();
            $table->dateTime('role_updated')->nullable();
            $table->string('role_system', 10)->default('no')->comment('yes | no (system roles cannot be deleted)');
            $table->string('role_type', 10)->comment('client|team');
            $table->string('role_name', 100);
            $table->tinyInteger('role_clients')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_contacts')->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_contracts')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_invoices')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_estimates')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_proposals')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_payments')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_items')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_tasks')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_workorders')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_proforma_invoices')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_amc_invoices')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_tasks_scope', 20)->default('own')->comment('own | global');
            $table->tinyInteger('role_projects')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_projects_scope', 20)->default('own')->comment('own | global');
            $table->string('role_projects_billing', 20)->default('0')->comment('none (0) | view (1) | view-add-edit (2)');
            $table->tinyInteger('role_leads')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_leads_scope', 20)->default('own')->comment('own | global');
            $table->tinyInteger('role_expenses')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_expenses_scope', 20)->default('own')->comment('own | global');
            $table->integer('role_timesheets')->default(0)->comment('none (0) | view (1) | view-delete (2)');
            $table->string('role_timesheets_scope', 20)->default('own')->comment('own | global');
            $table->tinyInteger('role_team')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_team_scope', 20)->default('global')->comment('own | global');
            $table->tinyInteger('role_tickets')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->tinyInteger('role_knowledgebase')->default(0)->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_manage_knowledgebase_categories', 20)->default('no')->comment('yes|no');
            $table->string('role_assign_projects', 20)->default('no')->comment('yes|no');
            $table->string('role_assign_leads', 20)->default('no')->comment('yes|no');
            $table->string('role_assign_tasks', 20)->default('no')->comment('yes|no');
            $table->string('role_set_project_permissions', 20)->default('no')->comment('yes|no');
            $table->string('role_subscriptions', 20)->default('0')->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_templates_projects', 20)->default('1')->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_templates_contracts', 20)->default('1')->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_templates_proposals', 20)->default('1')->comment('none (0) | view (1) | view-add-edit (2) | view-edit-add-delete (3)');
            $table->string('role_content_import', 20)->default('yes')->comment('yes|no');
            $table->string('role_content_export', 20)->default('yes')->comment('yes|no');
            $table->string('role_module_cs_affiliate', 20)->default('3')->comment('global');
            $table->string('role_homepage', 100)->default('dashboard');
            $table->string('role_messages', 20)->default('yes')->comment('yes|no');
            $table->string('role_reports', 20)->default('no')->comment('yes|no');
            $table->string('role_canned', 20)->default('no')->comment('yes|no');
            $table->string('role_canned_scope', 20)->default('own')->comment('own|global');
            // Indexes
            $table->index('role_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
