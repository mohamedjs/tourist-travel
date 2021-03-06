<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferContentOfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_content_ofs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offers_id')->unsigned();
            $table->string('feature');
            $table->foreign("offers_id")->references("id")->on('offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_content_ofs');
    }
}
