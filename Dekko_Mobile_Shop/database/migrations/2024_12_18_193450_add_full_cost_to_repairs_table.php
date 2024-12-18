<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFullCostToRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repairs', function (Blueprint $table) {
            // Adding the full_cost column to the repairs table
            $table->decimal('full_cost', 10, 2)->default(0.00)->after('estimated_cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repairs', function (Blueprint $table) {
            // Dropping the full_cost column if rollback is done
            $table->dropColumn('full_cost');
        });
    }
}
