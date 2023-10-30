<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDurableArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_durable_articles', function (Blueprint $table) {
            $table->id();
            $table->string('da_id');
            $table->string('da_name')->nullable();
            $table->string('cargiver_id')->nullable();
            $table->dateTime('date_get')->nullable();
            $table->dateTime('time_of_use')->nullable();
            $table->integer('da_price')->nullable();
            $table->integer('da_flag')->nullable();
            $table->dateTime('da_recheck_year')->nullable();
            $table->string('room_id')->nullable();
            $table->integer('id_type')->nullable();
            $table->integer('count_report')->nullable();
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
        Schema::dropIfExists('tb_durable_articles');
    }
}
