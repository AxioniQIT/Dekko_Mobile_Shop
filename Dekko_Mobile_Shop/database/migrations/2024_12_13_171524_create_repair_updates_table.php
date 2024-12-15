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
        // Repair Updates Table
        Schema::create('repair_updates', function (Blueprint $table) {
            $table->id('update_id');
            $table->foreignId('repair_id')->constrained('repairs', 'repair_id')->onDelete('cascade');
            $table->text('update_description');
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_updates');
    }
};
