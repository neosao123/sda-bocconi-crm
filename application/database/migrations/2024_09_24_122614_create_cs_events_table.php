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
        Schema::create('cs_events', function (Blueprint $table) {
            $table->id('cs_event_id');
            $table->date('cs_event_created');
            $table->date('cs_event_updated');
            $table->integer('cs_event_affliateid');
            $table->integer('cs_event_invoiceid');
            $table->string('cs_event_project_title', 250)->nullable();
            $table->decimal('cs_event_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_events');
    }
};
