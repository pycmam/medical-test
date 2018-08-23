<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_slots', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('clinic_id', false, true);
            $table->integer('doctor_id', false, true)->nullable(true);
            $table->text('notes')->nullable(true);
            $table->dateTime('start_at');
            $table->dateTime('finish_at');
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_slots');
    }
}
