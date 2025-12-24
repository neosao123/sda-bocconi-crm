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
        Schema::create('webforms', function (Blueprint $table) {
            $table->id('webform_id'); // This creates an auto-incrementing primary key
            $table->string('webform_uniqueid', 100)->nullable();
            $table->dateTime('webform_created');
            $table->dateTime('webform_updated');
            $table->integer('webform_creatorid');
            $table->string('webform_title', 100)->nullable();
            $table->string('webform_type', 100)->nullable()->comment('lead|etc');
            $table->text('webform_builder_payload')->nullable()->comment('json object from form builder');
            $table->text('webform_thankyou_message')->nullable();
            $table->string('webform_notify_assigned', 10)->default('no')->comment('yes|no');
            $table->string('webform_notify_admin', 10)->default('no')->comment('yes|no');
            $table->tinyInteger('webform_submissions')->default(0);
            $table->string('webform_user_captcha', 10)->default('no')->comment('yes|no');
            $table->string('webform_submit_button_text', 100)->nullable();
            $table->string('webform_background_color', 100)->default('#FFFFFF')->comment('white default');
            $table->string('webform_lead_title', 100)->nullable();
            $table->string('webform_status', 100)->default('enabled')->comment('enabled|disabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webforms');
    }
};
