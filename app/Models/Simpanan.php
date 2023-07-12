<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'tbl_trans_sp';
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['tgl_transaksi', 'anggota_id', 'jenis_id', 'jumlah', 'keterangan', 'akun'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['tgl_transaksi' => 'datetime:d/m/Y H:i','jumlah' => 'integer','description' => 'string','created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'anggota_id', 'id');
    }
    public function jenis_akun()
    {
        return $this->belongsTo(\App\Models\JenisAkun::class, 'jenis_id', 'id');
    }
}
