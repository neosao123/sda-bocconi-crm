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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id('milestone_id');
            $table->dateTime('milestone_created');
            $table->dateTime('milestone_updated');
            $table->integer('milestone_creatorid')->unsigned();
            $table->string('milestone_title', 250)->default('uncategorised');
            $table->integer('milestone_projectid')->nullable()->unsigned();
            $table->integer('milestone_position')->default(1);
            $table->string('milestone_type', 50)->default('categorised')
                ->comment('categorised|uncategorised [1 uncategorised milestone if automatically created when a new project is created]');
            $table->string('milestone_color', 50)->default('default')
                ->comment('default|primary|success|info|warning|danger|lime|brown');

            $table->index('milestone_projectid');
            $table->index('milestone_creatorid');
            $table->index('milestone_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
