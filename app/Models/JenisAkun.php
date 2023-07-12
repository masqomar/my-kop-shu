<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAkun extends Model
{
    use HasFactory;

    protected $table = 'jns_akun';
    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = [
    'kd_aktiva', 
    'jns_trans', 
    'akun', 
    'laba_rugi', 
    'pemasukan', 
    'pengeluaran', 
    'aktif'];

   /**
    * The attributes that should be cast.
    *
    * @var string[]
    */
   protected $casts = [
    'kd_aktiva' => 'string',
    'jns_trans' => 'string',
    'akun' => 'string',
    'laba_rugi' => 'string',
    'pemasukan' => 'string',
    'pengeluaran' => 'string',
    'aktif' => 'string',
    'created_at' => 'datetime:d/m/Y H:i', 
    'updated_at' => 'datetime:d/m/Y H:i'
];

}
