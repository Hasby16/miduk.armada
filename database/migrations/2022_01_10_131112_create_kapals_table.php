<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKapalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kapals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('jenis');
            $table->float('kapasitas');
            $table->float('panjang');
            $table->bigInteger('sewa_sekali_jalan')->nullable();
            $table->bigInteger('sewa_hari')->nullable();
            $table->bigInteger('sewa_jam')->nullable();
            $table->string('description');
            $table->string('image_url');
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
        Schema::dropIfExists('kapals');
    }
}
