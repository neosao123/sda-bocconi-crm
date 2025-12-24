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
        Schema::create('tableconfig', function (Blueprint $table) {
            $table->id('tableconfig_id'); // Auto-incrementing ID
            $table->dateTime('tableconfig_created')->nullable(); // Custom created timestamp
            $table->dateTime('tableconfig_updated')->nullable(); // Creates `tableconfig_created` and `tableconfig_updated`
            $table->integer('tableconfig_userid')->notNullable();
            $table->string('tableconfig_table_name', 150)->notNullable();

            for ($i = 1; $i <= 40; $i++) {
                $table->string("tableconfig_column_$i", 20)->default('hidden')->comment('hidden|displayed');
            }
            // Custom columns for hidden/displayed settings
            for ($i = 1; $i <= 40; $i++) {
                $table->string("tableconfig_custom_$i", 20)->default('hidden')->comment('hidden|displayed');
            }

            $table->index('tableconfig_userid');
            $table->index('tableconfig_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tableconfig');
    }
};
