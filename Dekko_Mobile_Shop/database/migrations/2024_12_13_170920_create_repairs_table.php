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
      // Repairs Table
      Schema::create('repairs', function (Blueprint $table) {
        $table->id('repair_id');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('customer_name');
        $table->string('customer_contact');
        $table->text('device_details');
        $table->text('issue_description');
        $table->decimal('estimated_cost', 10, 2)->nullable();
        $table->enum('status', ['Pending', 'In Progress', 'Completed', 'Cancelled']);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};