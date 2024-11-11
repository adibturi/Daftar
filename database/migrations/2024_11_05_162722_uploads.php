<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('bukti_pembayaran');
            $table->timestamps();

            $table->foreign('nisn')->references('nisn')->on('pendaftaran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('uploads');
    }
