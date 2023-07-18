<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKas extends Model
{
  use HasFactory;
  public $timestamps = false;
  protected $table = 'tbl_trans_kas';

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'tgl_catat',
    'jumlah',
    'keterangan',
    'akun',
    'dari_kas_id',
    'untuk_kas_id',
    'jns_trans',
    'dk',
    'update_data',
    'user_name'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var string[]
   */
  protected $casts =
  [
    'tgl_catat' => 'datetime:d/m/Y H:i',
    'jumlah' => 'integer',
    'keterangan' => 'string',
    'akun' => 'string',
    'dari_kas_id' => 'integer',
    'untuk_kas_id' => 'integer',
    'jns_trans' => 'integer',
    'dk' => 'string',
  ];

  public function dari_kas()
  {
    return $this->belongsTo(\App\Models\JenisKas::class, 'dari_kas_id', 'id');
  }
  public function untuk_kas()
  {
    return $this->belongsTo(\App\Models\JenisKas::class, 'untuk_kas_id', 'id');
  }
  public function jenis_akun()
  {
    return $this->belongsTo(\App\Models\JenisAkun::class, 'jns_trans', 'id');
  }
}
