<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableControlDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('controls_id');
            $table->foreign('controls_id')->references('id')->on('controls');
            $table->string('articles',225);
            $table->string('dirty',225);
            $table->string('clean',225);
            $table->string('description',225);
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
        Schema::table('control_details', function (Blueprint $table) {
            //
        });
    }
}
