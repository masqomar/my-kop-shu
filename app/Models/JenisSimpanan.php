<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSimpanan extends Model
{
    use HasFactory;
    protected $table = 'jns_simpan';
    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = ['jns_simpan', 'jumlah', 'tampil'];

   /**
    * The attributes that should be cast.
    *
    * @var string[]
    */
   protected $casts = ['jns_simpan' => 'string','jumlah' => 'integer','tampil' => 'string','created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

}
