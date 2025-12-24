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
        Schema::create('deliverables_lineentries', function (Blueprint $table) {
            $table->id('deliverables_lineentry_id');
            $table->integer('deliverables_lineentry_deliverablesid')->nullable();
            $table->integer('deliverables_lineentry_techstackid')->nullable();
            $table->dateTime('deliverables_lineentry_created')->nullable();
            $table->dateTime('deliverables_lineentry_updated')->nullable();
            $table->integer('deliverables_lineentry_creatorid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliverables_lineentries');
    }
};
