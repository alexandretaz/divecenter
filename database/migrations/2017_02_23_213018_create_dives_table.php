<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dives', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('logbook_id')->unsigned();
            $table->time('duration');
            $table->datetime('dive_datetime_begins')->nullable();
            $table->datetime('dive datetime_ends')->nullable();
            $table->string('gas_mix')->default('air');
            $table->float('ppo2');
            $table->float('pn2');
            $table->integer('max_depth');
            $table->longText('comments');
            $table->longText('extra')->nullable();
            $table->timestamps();
            $table->foreign('logbook_id')->references('id')->on('log_books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dives');
    }
}
