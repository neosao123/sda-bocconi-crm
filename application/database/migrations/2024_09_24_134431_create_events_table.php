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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->dateTime('event_created')->nullable()->comment('[notes] Events record the event, whilst timelines determine where the event is displayed');
            $table->dateTime('event_updated')->nullable();
            $table->integer('event_creatorid')->comment('use ( -1 ) for logged out user.');
            $table->integer('event_clientid')->nullable()->comment('for client type resources');
            $table->string('event_creator_name', 150)->nullable()->comment('for events created by users who are not registered (e.g. accepting a proposal)');
            $table->string('event_item', 150)->nullable()->comment('status | project | task | lead | expense | estimate | comment | attachment | file | invoice | payment | assigned');
            $table->integer('event_item_id')->nullable()->comment('e.g. invoice_id (used in the link shown in the event)');
            $table->text('event_item_content')->nullable()->comment('e.g. #INV-029200 (used in the text if the event, also in the link text)');
            $table->text('event_item_content2')->nullable()->comment('extra content');
            $table->text('event_item_content3')->nullable()->comment('extra content');
            $table->text('event_item_content4')->nullable()->comment('extra content');
            $table->string('event_item_lang', 150)->nullable()->comment('(e.g. - event_created_invoice found in the lang file)');
            $table->string('event_item_lang_alt', 150)->nullable()->comment('Example: Fred posted a comment (as opposed to) You posed a comment');
            $table->string('event_parent_type', 150)->nullable()->comment('used to identify the parent up the tree (e.g. for a task, parent is project)');
            $table->string('event_parent_id', 150)->nullable()->comment('id of the parent item (e.g. project_id)');
            $table->string('event_parent_title', 150)->nullable()->comment('e.g. task title');
            $table->string('event_show_item', 150)->default('yes')->comment('yes|no (if the item should be shown in the notifications dropdown)');
            $table->string('event_show_in_timeline', 150)->default('yes')->comment('yes|no (if this should show the project timeline)');
            $table->string('event_notification_category', 150)->nullable()->comment('(e.g. notifications_new_invoice) This determines if a user will get a web notification, an email, both, or none.');
            $table->string('eventresource_type', 50)->nullable()->comment('[polymorph] project | ticket | lead (e.g. if you want the event to show in the project timeline, then eventresource_type must be set to project)');
            $table->integer('eventresource_id')->nullable()->comment('[polymorph] e.g project_id');

            // Define indexes
            $table->index('eventresource_type');
            $table->index('eventresource_id');
            $table->index('event_creatorid');
            $table->index('event_item');
            $table->index('event_parent_type');
            $table->index('event_parent_id');
            $table->index('event_item_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
