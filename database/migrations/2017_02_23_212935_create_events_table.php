<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->dateTime('begins');
            $table->dateTime('ends');
            $table->string('eventable_type',255);
            $table->integer('eventable_id')->unsigned();
            $table->decimal('cost',10,2);
            $table->decimal('price', 10,2);
            $table->string('model');
            $table->json('prices');
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
        Schema::dropIfExists('events');
    }
}
