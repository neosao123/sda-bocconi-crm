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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id('timeline_id');
            $table->unsignedBigInteger('timeline_eventid');
            $table->string('timeline_resourcetype', 50)->nullable()->comment('invoices | projects | estimates | etc');
            $table->unsignedBigInteger('timeline_resourceid')->nullable()->comment('the id of the item affected');

            // Indexes
            $table->index('timeline_eventid');
            $table->index('timeline_resourcetype');
            $table->index('timeline_resourceid');

            // Table comment
            $table->comment = '[truncate]';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelines');
    }
};
