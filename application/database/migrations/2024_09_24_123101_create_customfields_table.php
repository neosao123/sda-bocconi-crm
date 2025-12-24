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
        Schema::create('customfields', function (Blueprint $table) {
            $table->integer('customfields_id')->autoIncrement();
            $table->dateTime('customfields_created');
            $table->dateTime('customfields_updated');
            $table->integer('customfields_position')->default(1);
            $table->string('customfields_datatype', 50)->default('text')->comment('text|paragraph|number|decimal|date|checkbox|dropdown');
            $table->text('customfields_datapayload')->nullable()->comment('use this to store dropdown lists etc');
            $table->string('customfields_type', 50)->nullable()->comment('clients|projects|leads|tasks|tickets');
            $table->string('customfields_name', 250)->nullable()->comment('e.g. project_custom_field_1');
            $table->string('customfields_title', 250)->nullable();
            $table->string('customfields_required', 5)->default('no')->comment('yes|no - standard form');
            $table->string('customfields_show_client_page', 100)->nullable();
            $table->string('customfields_show_project_page', 100)->nullable();
            $table->string('customfields_show_task_summary', 100)->nullable();
            $table->string('customfields_show_lead_summary', 100)->nullable();
            $table->string('customfields_show_invoice', 100)->nullable();
            $table->string('customfields_show_ticket_page', 100)->default('no');
            $table->string('customfields_show_filter_panel', 100)->default('no')->comment('yes|no');
            $table->string('customfields_standard_form_status', 100)->default('disabled')->comment('disabled | enabled');
            $table->string('customfields_status', 50)->default('disabled')->comment('disabled | enabled');
            $table->string('customfields_sorting_a_z', 5)->default('z')->comment('hack to get sorting right, excluding null title items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customfields');
    }
};
