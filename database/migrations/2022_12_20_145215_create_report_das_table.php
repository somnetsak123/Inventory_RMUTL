<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_das', function (Blueprint $table) {
            $table->id('report_id');
            $table->string('da_id')->nullable();
            $table->string('da_name')->nullable();
            $table->string('caregiver_name')->nullable();
            $table->dateTime('date_get')->nullable();
            $table->dateTime('time_of_use')->nullable();
            $table->integer('da_price')->nullable();
            $table->integer('da_flag')->nullable();
            $table->dateTime('da_recheck_year')->nullable();
            $table->string('room_id')->nullable();
            $table->integer('id_type')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('note')->nullable();
            $table->string('report_state')->nullable();
            $table->integer('count_report')->nullable();
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('Email')->nullable();

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
        Schema::dropIfExists('report_das');
    }
}
