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
        Schema::create('updates', function (Blueprint $table) {
            $table->id('update_id');
            $table->dateTime('update_created');
            $table->dateTime('update_updated');
            $table->decimal('update_version', 10, 2)->nullable();
            $table->string('update_mysql_filename', 100)->nullable();

            // Table comment
            $table->comment = 'tracks updates sql file execution';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('updates');
    }
};
