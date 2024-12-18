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
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id('spare_part_id'); // Primary key
            $table->string('name'); // Spare part name
            $table->text('description')->nullable(); // Spare part description
            $table->decimal('price', 10, 2); // Price of the spare part
            $table->integer('stock_quantity'); // Available stock quantity
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_parts');
    }
};

