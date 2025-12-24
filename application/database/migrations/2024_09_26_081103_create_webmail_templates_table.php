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
        Schema::create('webmail_templates', function (Blueprint $table) {
            $table->id('webmail_template_id'); // Creates an auto-incrementing primary key
            $table->dateTime('webmail_template_created');
            $table->dateTime('webmail_template_updated');
            $table->integer('webmail_template_creatorid');
            $table->string('webmail_template_name', 150)->nullable();
            $table->text('webmail_template_body')->nullable();
            $table->text('webmail_template_type')->nullable()->comment('clients|leads');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webmail_templates');
    }
};
