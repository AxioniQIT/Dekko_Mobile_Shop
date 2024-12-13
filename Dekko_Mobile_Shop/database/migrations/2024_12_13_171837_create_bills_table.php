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
       // Bills Table
       Schema::create('bills', function (Blueprint $table) {
        $table->id('bill_id');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('customer_name');
        $table->decimal('total_amount', 10, 2);
        $table->timestamp('bill_date')->useCurrent();
        $table->enum('billing_type', ['Sale', 'Repair']);
        $table->enum('status', ['Paid', 'Pending', 'Refunded']);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
