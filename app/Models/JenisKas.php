<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKas extends Model
{
    use HasFactory;

    
    protected $table = 'nama_kas_tbl';
    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = [
    'nama', 
    'aktif', 
    'tmpl_simpan', 
    'tmpl_penarikan', 
    'tmpl_pinjaman', 
    'tmpl_bayar', 
    'tmpl_pemasukan', 
    'tmpl_pengeluaran', 
    'tmpl_transfer'
];

   /**
    * The attributes that should be cast.
    *
    * @var string[]
    */
   protected $casts = [
    'nama' => 'string',
    'aktif' => 'string',
    'tmpl_simpan' => 'string',
    'tmpl_penarikan' => 'string',
    'tmpl_pinjaman' => 'string',
    'tmpl_bayar' => 'string',
    'tmpl_pemasukan' => 'string',
    'tmpl_pengeluaran' => 'string',
    'tmpl_transfer' => 'string',
    'created_at' => 'datetime:d/m/Y H:i', 
    'updated_at' => 'datetime:d/m/Y H:i'
];


}
