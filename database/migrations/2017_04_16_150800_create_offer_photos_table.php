<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_photos', function (Blueprint $table) {
          $table->increments('id');
          $table->string("photo_name");
          //$table->string("photo_path");
          $table->string("mime") ;
          $table->integer('offers_id')->unsigned();
          $table->foreign('offers_id')->references('id')->on('offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_photos');
    }
}
