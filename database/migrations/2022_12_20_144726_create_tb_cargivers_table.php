<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCargiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cargivers', function (Blueprint $table) {
            $table->id('cargiver_id');
            $table->string('caregiver_name')->nullable();
            $table->integer('user_statuses')->nullable();
            $table->string('cargiver_username')->nullable();
            $table->string('cargiver_password')->nullable();
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
        Schema::dropIfExists('tb_cargiver');
    }
}
