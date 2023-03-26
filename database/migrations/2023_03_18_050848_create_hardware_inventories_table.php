<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number');
            $table->string('asset_number');
            $table->dateTime('purchase_date');
            $table->integer('purchase_price');
            $table->string('department_id');
            $table->string('location');
            $table->string('disposition');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardware_inventories');
    }
};
