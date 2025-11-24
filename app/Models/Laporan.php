<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_laporan';  
    public $incrementing = true;

    protected $fillable = [
        'id_warga',
        'jenis_laporan',
        'judul',
        'tanggal',
        'alamat',
        'keterangan',
        'foto',
        'status',
        'prioritas',
        'urgensi',
        'lokasi'
    ];

    // Relasi ke User (warga)
    public function warga()
    {
        return $this->belongsTo(User::class, 'id_warga');
    }
}
