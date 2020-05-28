<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('e_name')->index();
            $table->string('e_intro');
            $table->string('e_detail');
            $table->integer('e_status')->default(0);
            $table->datetime('e_start_time');
            $table->datetime('e_end_time');
            $table->string('e_chairman');
            $table->string('e_image')->nullable();
            $table->string('e_place');
            $table->integer('e_max_register')->default(0);
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
