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
        Schema::create('contract_templates', function (Blueprint $table) {
            $table->id('contract_template_id');
            $table->dateTime('contract_template_created');
            $table->dateTime('contract_template_updated');
            $table->integer('contract_template_creatorid')->nullable();
            $table->string('contract_template_title', 250)->nullable();
            $table->string('contract_template_heading_color', 30)->default('#7493a9');
            $table->string('contract_template_title_color', 30)->default('#7493a9');
            $table->text('contract_template_body')->nullable();
            $table->string('contract_template_system', 20)->default('no')->comment('yes|no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_templates');
    }
};
