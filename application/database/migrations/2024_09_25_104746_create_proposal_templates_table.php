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
        Schema::create('proposal_templates', function (Blueprint $table) {
            $table->id('proposal_template_id');
            $table->dateTime('proposal_template_created');
            $table->dateTime('proposal_template_updated');
            $table->unsignedBigInteger('proposal_template_creatorid')->nullable();
            $table->string('proposal_template_title', 250)->nullable();
            $table->string('proposal_template_heading_color', 30)->default('#FFFFFF');
            $table->string('proposal_template_title_color', 30)->default('#FFFFFF');
            $table->text('proposal_template_body')->nullable();
            $table->unsignedBigInteger('proposal_template_estimate_id')->nullable();
            $table->string('proposal_template_system', 20)->default('no')->comment('yes|no');


            // Index for creator ID
            $table->index('proposal_template_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_templates');
    }
};
