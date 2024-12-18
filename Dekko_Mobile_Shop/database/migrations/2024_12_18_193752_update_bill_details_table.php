<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            // Adding spare_part_id for tracking spare parts used in repairs
            $table->unsignedBigInteger('spare_part_id')->nullable()->after('repair_id');

            // Updating the foreign key for spare_part_id if it exists
            $table->foreign('spare_part_id')->references('spare_part_id')->on('spare_parts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            // Dropping the spare_part_id column if rollback is done
            $table->dropForeign(['spare_part_id']);
            $table->dropColumn('spare_part_id');
        });
    }
}
