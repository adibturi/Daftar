<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;
use App\Models\upload;

class upload extends Model
{
    use HasFactory;
    protected $table = 'uploads';
    protected $fillable = ['nisn', 'bukti_pembayaran'];

    // Relasi ke model Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'nisn', 'nisn');
    }
}
