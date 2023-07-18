<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Simpanan extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = false;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Transaksi Simpanan')
            ->logOnly(['user.first_name', 'jenis_id', 'jumlah', 'tgl_transaksi', 'keterangan', 'kas_id']);
        // ->setDescriptionForEvent(fn (string $eventName) ,=> "This model has been {$eventName}");
    }

    protected $table = 'tbl_trans_sp';
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tgl_transaksi', 
        'anggota_id', 
        'jenis_id', 
        'jumlah', 
        'keterangan', 
        'akun',
        'kas_id',
        'dk',
        'update_data',
        'user_name',
        'nama_penyetor',
        'no_identitas',
        'alamat'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['tgl_transaksi' => 'datetime:d/m/Y H:i','jumlah' => 'integer'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'anggota_id', 'id');
    }
    public function jenis_akun()
    {
        return $this->belongsTo(\App\Models\JenisAkun::class, 'jenis_id', 'id');
    }

}
