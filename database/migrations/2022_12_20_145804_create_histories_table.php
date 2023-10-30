<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id('histories_id');
            $table->string('da_id');
            $table->string('da_name');
            $table->string('caregiver_name');
            $table->dateTime('date_get');
            $table->dateTime('time_of_use');
            $table->integer('da_price');
            $table->integer('da_flag');
            $table->dateTime('da_recheck_year');
            $table->string('room_id');
            $table->integer('id_type')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
