<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'tbl_pinjaman_h';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tgl_pinjam',
        'anggota_id',
        'barang_id',
        'lama_angsuran',
        'jumlah',
        'bunga',
        'biaya_adm',
        'lunas',
        'dk',
        'kas_id',
        'jns_trans'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['tgl_pinjam' => 'datetime:d/m/Y H:i', 'lama_angsuran' => 'integer', 'jumlah' => 'integer', 'bunga' => 'integer', 'biaya_adm' => 'integer', 'lunas' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'anggota_id', 'id');
    }
    // public function pinjaman_detail()
    // {
    //     return $this->hasMany(\App\Models\PinjamanDetail::class, 'id', 'pinjam_id');
    // }

    // public function barang()
    // {
    //     return $this->belongsTo(\App\Models\JenisBarang::class, 'barang_id', 'id');
    // }
    // public function pinjaman_detail()
    // {
    //     return $this->hasMany(\App\Models\PinjamanDetail::class, 'id', 'pinjam_id');
    // }
}
