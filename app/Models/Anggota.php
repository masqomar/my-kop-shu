<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_anggota';

    protected $fillable = [
        'nama',
        'identitas',
        'jk' => 'L',
        'tmp_lahir',
        'tgl_lahir',
        'status',
        'agama',
        'departement',
        'pekerjaan',
        'alamat',
        'kota',
        'notelp',
        'tgl_daftar',
        'jabatan_id',
        'aktif',
        'file_pic',
    ];
}
