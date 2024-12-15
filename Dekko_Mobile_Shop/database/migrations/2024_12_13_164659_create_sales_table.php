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
        // Sales Table
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->timestamp('sale_date')->useCurrent();
            $table->string('customer_name');
            $table->string('customer_contact');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method', ['Cash', 'Credit Card', 'Bank Transfer', 'Other']);
            $table->enum('status', ['Completed', 'Pending', 'Cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};