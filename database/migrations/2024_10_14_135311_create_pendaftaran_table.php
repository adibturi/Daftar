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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nisn', 10)->unique();
            $table->string('nomor_telepon', 15);
            $table->string('kartu_keluarga')->nullable(); // file upload
            $table->string('akta_kelahiran')->nullable(); // file upload
            $table->string('foto_siswa')->nullable(); // file upload
            $table->string('raport')->nullable(); // file upload
            $table->string('kartu_bantuan_sosial')->nullable(); // file upload
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
};
