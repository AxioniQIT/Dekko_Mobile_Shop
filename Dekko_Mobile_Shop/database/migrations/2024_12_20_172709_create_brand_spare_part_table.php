<?php

// database/migrations/xxxx_xx_xx_create_brand_spare_part_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSparePartTable extends Migration
{
    public function up()
    {
        Schema::create('brand_spare_part', function (Blueprint $table) {
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('spare_part_id')->unsigned();
            $table->primary(['brand_id', 'spare_part_id']);

            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('cascade');
            $table->foreign('spare_part_id')->references('spare_part_id')->on('spare_parts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brand_spare_part');
    }
}