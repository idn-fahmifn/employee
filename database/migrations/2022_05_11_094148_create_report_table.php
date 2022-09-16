<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_attendance')->unsigned();
            $table->string('nama_laporan');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->foreign('id_attendance')->references('id')->on('attendance');
        });
    }
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
