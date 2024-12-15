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
        // Product Update History
        Schema::create('product_update_history', function (Blueprint $table) {
            $table->id('history_id'); // Primary Key
            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade'); // Foreign Key to Products
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade'); // Foreign Key to Users
            $table->integer('previous_stock'); // Previous stock value
            $table->integer('updated_stock'); // Updated stock value
            $table->string('updated_by'); // Person responsible for update
            $table->timestamps(); // Includes created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_update_histories');
    }
};
