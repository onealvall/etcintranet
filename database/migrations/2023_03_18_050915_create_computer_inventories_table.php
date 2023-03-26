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
        Schema::create('computer_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('computer_name');
            $table->string('computer_type');
            $table->string('asset_number');
            $table->string('domain');
            $table->string('system_type');
            $table->integer('department');
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
        Schema::dropIfExists('computer_inventories');
    }
};
