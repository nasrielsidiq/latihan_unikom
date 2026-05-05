<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    protected $fillable = [
        'nama',
        'nim',
        'jenis_kelamin',
        'kelas',
        'jurusan',
        'tahun_masuk',
        'agama',
        'alamat_asal',
        'alamat_sekarang',
        'foto',
        'link_ig',
        'link_linkedin',
    ];

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
}
