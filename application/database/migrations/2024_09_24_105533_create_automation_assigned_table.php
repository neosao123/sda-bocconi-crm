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
        Schema::create('automation_assigned', function (Blueprint $table) {
            $table->id('automationassigned_id');
            $table->dateTime('automationassigned_created')->nullable();
            $table->integer('automationassigned_updated')->nullable();
            $table->integer('automationassigned_userid')->nullable();
            $table->string('automationassigned_resource_type', 150)
                ->nullable()
                ->comment('estimate|product_task');
            $table->integer('automationassigned_resource_id')
                ->nullable()
                ->comment('use ID 0, for system default users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automation_assigned');
    }
};
