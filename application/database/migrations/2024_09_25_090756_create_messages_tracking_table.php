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
        Schema::create('messages_tracking', function (Blueprint $table) {
            $table->id('messagestracking_id');
            $table->dateTime('messagestracking_created');
            $table->dateTime('messagestracking_update');
            $table->string('messagestracking_massage_unique_id', 120);
            $table->string('messagestracking_target', 120)->nullable();
            $table->string('messagestracking_user_unique_id', 120)->nullable();
            $table->string('messagestracking_type', 50)->nullable()->comment('read|delete');

            // Indexes
            $table->index('messagestracking_target');
            $table->index('messagestracking_user_unique_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_tracking');
    }
};
