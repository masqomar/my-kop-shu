<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewTransaksi extends Model
{
    use HasFactory;

    protected $table = 'v_transaksi';

    public function jenis_akun()
	{
		return $this->belongsTo(\App\Models\JenisAkun::class, 'transaksi', 'id');
	}
}
