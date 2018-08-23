<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slot_id', false, true);
            $table->integer('client_id', false, true)->nullable();
            $table->dateTime('visited_at')->nullable(true);
            $table->smallInteger('status')->default(0);
            $table->text('notes')->nullable(true);
            $table->timestamps();

            $table->foreign('slot_id')->references('id')->on('schedule_slots')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_meetings');
    }
}
