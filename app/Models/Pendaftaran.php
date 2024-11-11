<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    // Menyatakan bahwa primary key adalah `nisn`
    protected $primaryKey = 'nisn';

    // Jika `nisn` bukan integer, tambahkan ini
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'nisn',
        'nomor_telepon',
        'kartu_keluarga',
        'akta_kelahiran',
        'foto_siswa',
        'raport',
        'kartu_bantuan_sosial',
    ];
    public function uploads()
{
    return $this->hasMany(Upload::class, 'nisn', 'nisn');
}
}
