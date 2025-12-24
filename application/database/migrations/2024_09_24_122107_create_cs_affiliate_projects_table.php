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
        Schema::create('cs_affiliate_projects', function (Blueprint $table) {
            $table->id('cs_affiliate_project_id');
            $table->integer('cs_affiliate_project_created');
            $table->integer('cs_affiliate_project_updated');
            $table->integer('cs_affiliate_project_creatorid');
            $table->integer('cs_affiliate_project_affiliateid');
            $table->integer('cs_affiliate_project_projectid');
            $table->decimal('cs_affiliate_project_commission_rate', 10, 2)->nullable();
            $table->string('cs_affiliate_project_status', 100)->default('active')->comment('active|suspended');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_affiliate_projects');
    }
};
