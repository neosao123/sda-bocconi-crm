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
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->dateTime('item_created')->nullable();
            $table->dateTime('item_updated')->nullable();
            $table->integer('item_categoryid')->default(8);
            $table->integer('item_creatorid');
            $table->string('item_type', 100)->default('standard')->comment('standard|dimensions');
            $table->text('item_description')->nullable();
            $table->string('item_unit', 50)->nullable();
            $table->decimal('item_rate', 15, 2);
            $table->string('item_tax_status', 100)->default('taxable')->comment('taxable|exempt');
            $table->decimal('item_dimensions_length', 15, 2)->nullable();
            $table->decimal('item_dimensions_width', 15, 2)->nullable();
            $table->text('item_notes_estimatation')->nullable();
            $table->text('item_notes_production')->nullable();

            // Indexes
            $table->index('item_categoryid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
