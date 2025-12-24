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
        Schema::create('tax', function (Blueprint $table) {
            $table->id('tax_id');
            $table->integer('tax_taxrateid')->comment('Reference to tax rates table');
            $table->dateTime('tax_created');
            $table->dateTime('tax_updated');
            $table->string('tax_name', 100)->nullable();
            $table->decimal('tax_rate', 10, 2)->nullable();
            $table->string('tax_type', 50)->default('summary')->comment('summary|inline');
            $table->integer('tax_lineitem_id')->nullable()->comment('for inline taxes');
            $table->string('taxresource_type', 50)->nullable()->comment('invoice|estimate|lineitem');
            $table->integer('taxresource_id')->nullable();

            $table->index('taxresource_type');
            $table->index('taxresource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax');
    }
};
