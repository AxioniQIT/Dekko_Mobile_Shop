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
        Schema::create('repair_spare_parts', function (Blueprint $table) {
            $table->id('repair_spare_part_id'); // Primary Key
            $table->unsignedBigInteger('repair_id'); // Foreign key for repairs
            $table->unsignedBigInteger('spare_part_id'); // Foreign key for spare parts
            $table->integer('quantity'); // Quantity of the spare part used
            $table->decimal('total_price', 10, 2); // Total cost for the spare part (quantity * price)

            // Foreign Key Constraints
            $table->foreign('repair_id')->references('repair_id')->on('repairs')->onDelete('cascade');
            $table->foreign('spare_part_id')->references('spare_part_id')->on('spare_parts')->onDelete('cascade');

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repair_spare_parts');
    }

};
