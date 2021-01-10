<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_things', function (Blueprint $table) {
            $table->integer('data_id')->primary();
            $table->string('nama');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('satuan');
            $table->integer('hargajual');
            $table->string('supplier');
            $table->softDeletes();
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
        Schema::dropIfExists('data_things');
    }
}
