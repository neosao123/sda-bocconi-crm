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
        Schema::create('lineitems', function (Blueprint $table) {
            $table->id('lineitem_id'); // Auto-incrementing ID
            $table->integer('lineitem_position')->nullable(); // Position of the line item
            $table->dateTime('lineitem_created')->nullable(); // Creation date
            $table->dateTime('lineitem_updated')->nullable(); // Updated date
            $table->text('lineitem_description')->nullable(); // Description of the line item
            $table->string('lineitem_rate', 250)->nullable(); // Rate for the line item
            $table->string('lineitem_unit', 100)->nullable(); // Unit of the line item
            $table->float('lineitem_quantity')->nullable(); // Quantity of the line item
            $table->decimal('lineitem_total', 15, 2)->nullable(); // Total for the line item
            $table->string('lineitemresource_linked_type', 30)->nullable()->comment('task | expense'); // Linked resource type
            $table->integer('lineitemresource_linked_id')->nullable()->comment('e.g. task id'); // Linked resource ID
            $table->string('lineitemresource_type', 50)->nullable()->comment('[polymorph] invoice | estimate'); // Resource type
            $table->integer('lineitemresource_id')->nullable()->comment('[polymorph] e.g invoice_id'); // Resource ID
            $table->string('lineitem_type', 10)->default('plain')->comment('plain|time|dimensions'); // Type of the line item
            $table->integer('lineitem_time_hours')->nullable(); // Hours for time-based items
            $table->integer('lineitem_time_minutes')->nullable(); // Minutes for time-based items
            $table->text('lineitem_time_timers_list')->nullable()->comment('comma separated list of timers'); // Timers list
            $table->float('lineitem_dimensions_length')->nullable(); // Length for dimensions
            $table->float('lineitem_dimensions_width')->nullable(); // Width for dimensions
            $table->string('lineitem_tax_status', 100)->default('taxable')->comment('taxable|exempt'); // Tax status
            $table->integer('lineitem_linked_product_id')->nullable()->comment('the original product that created this line item'); // Linked product ID
            $table->string('lineitem_hsncode', 20)->nullable()->comment('hsncode or sac code');
            // Define indexes
            $table->index('lineitemresource_linked_type');
            $table->index('lineitemresource_linked_id');
            $table->index('lineitemresource_type');
            $table->index('lineitemresource_id');
            $table->index('lineitem_type');

            // Define the table engine and charset
            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb3';
            $table->collation = 'utf8mb3_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineitems');
    }
};
