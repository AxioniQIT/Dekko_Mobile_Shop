<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // System Logs Table
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->enum('activity_type', ['Login', 'Logout', 'Failed Attempt', 'Modification']);
            $table->text('activity_description');
            $table->timestamp('activity_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_logs');
    }
};