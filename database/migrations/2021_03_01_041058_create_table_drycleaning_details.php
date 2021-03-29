<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDrycleaningDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drycleaning_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('drycleanings_id');
            $table->foreign('drycleanings_id')->references('id')->on('drycleanings');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->string('quantity',225);
            $table->string('unitprice',225);
            $table->string('amount',225);
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
        Schema::table('drycleaning_details', function (Blueprint $table) {
            //
        });
    }
}
