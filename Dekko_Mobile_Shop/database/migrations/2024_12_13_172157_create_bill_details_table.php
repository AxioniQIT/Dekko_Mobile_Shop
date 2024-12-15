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
        // Billing Details Table
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id('bill_detail_id');
            $table->foreignId('bill_id')->constrained('bills', 'bill_id')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products', 'product_id')->onDelete('set null');
            $table->foreignId('repair_id')->nullable()->constrained('repairs', 'repair_id')->onDelete('set null');
            $table->integer('quantity')->nullable();
            $table->decimal('price_per_unit', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
