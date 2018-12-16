<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPersonTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('group_person', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('group_id')->unsigned();
            $table->integer('person_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('person_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_person');
    }
}
