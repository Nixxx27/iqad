<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFindingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finding_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('audit_title');
            $table->string('finding_num');
            $table->string('finding_category');
            $table->string('risk');
            $table->longText('findings');
            $table->string('department');
            $table->string('finding_status');
            $table->date('finding_due');
            $table->string('entered_by');
            $table->string('reference');
            $table->string('repeat_finding');
            $table->string('assigned_to');
            $table->date('date_discovered');
            $table->string('email');
            $table->longText('descriptor');
            $table->longText('cause');
            $table->string('person_org');
            $table->string('cause_category');
            $table->string('item');
            $table->longText('remarks');
            $table->string('finding_alert');
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
        Schema::drop('finding_tbl');
    }
}
