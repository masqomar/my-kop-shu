<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tbl_barang';

    protected $fillable = [
        'nm_barang', 
        'type', 
        'merk', 
        'harga', 
        'jml_brg', 
        'ket'
    ];
}
