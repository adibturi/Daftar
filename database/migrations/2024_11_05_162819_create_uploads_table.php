<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('uploads', function (Blueprint $table) {
        $table->id();
        $table->string('nisn', 10);
        $table->string('bukti_pembayaran');
        $table->timestamps();

        // Menambahkan foreign key dengan ON DELETE CASCADE
        $table->foreign('nisn')
              ->references('nisn')
              ->on('pendaftaran')
              ->onDelete('cascade'); // Ini adalah penambahan untuk ON DELETE CASCADE
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploads');
    }
};
