<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillsTableAddDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            // Adding discount field
            $table->decimal('discount', 10, 2)->nullable()->after('total_amount');

            // Adding total_after_discount field
            $table->decimal('total_after_discount', 10, 2)->default(0.00)->after('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            // Dropping discount and total_after_discount fields
            $table->dropColumn(['discount', 'total_after_discount']);
        });
    }
}
