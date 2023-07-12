<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaAngsuran extends Model
{
    use HasFactory;

    protected $table = 'jns_angsuran';
    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = [
    'ket', 
    'aktif', 
];

   /**
    * The attributes that should be cast.
    *
    * @var string[]
    */
   protected $casts = [
    'jns_angsuran' => 'integer',
    'aktif' => 'string',
    'created_at' => 'datetime:d/m/Y H:i', 
    'updated_at' => 'datetime:d/m/Y H:i'
];
}
