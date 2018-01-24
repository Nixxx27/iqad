<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action_num');
            $table->string('finding_numlink');
            $table->string('action_status');
            $table->date('action_due');
            $table->longText('actions');
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
        Schema::drop('action_tbl');
    }
}
