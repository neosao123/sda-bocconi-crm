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
        Schema::create('workorders', function (Blueprint $table) {
            $table->id('workorder_id');
            $table->unsignedBigInteger('workorder_client_id')->nullable();
            $table->unsignedBigInteger('workorder_quotation_id')->nullable();
            $table->date('workorder_date')->nullable();
            $table->longText('workorder_requirements')->nullable();
            $table->longText('workorder_requirement_attachments')->nullable();
            $table->unsignedBigInteger('workorder_creatorid')->nullable();
            $table->dateTime('workorder_created')->nullable();
            $table->dateTime('workorder_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workorders');
    }
};
