<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;


    protected $table = 'tbl_pengajuan';

    protected $fillable = [
        'no_ajuan', 
        'ajuan_id', 
        'anggota_id', 
        'tgl_input', 
        'jenis', 
        'nominal', 
        'lama_ags',
        'keterangan',
        'status',
        'alasan'
    ];

    protected $casts = [
        'no_ajuan' => 'integer',
        'ajuan_id' => 'string',
        'anggota_id' => 'integer',
        'tgl_input' => 'datetime:d/m/Y H:i',
        'jenis' => 'string',
        'nominal' => 'integer',
        'lama_ags' => 'integer',
        'keterangan' => 'string',
        'status' => 'integer',
        'alasan' => 'string',
        'created_at' => 'datetime:d/m/Y H:i', 
        'updated_at' => 'datetime:d/m/Y H:i'
    ];

    public function user()
   {
       return $this->belongsTo(\App\Models\User::class, 'anggota_id', 'id');
   }
}
