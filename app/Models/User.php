<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Kirschbaum\PowerJoins\PowerJoins;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Wallet
{
    use HasApiTokens, HasFactory, Notifiable, HasWallet, HasRoles, PowerJoins;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'mobile', 'country_code', 'cover', 'lat', 'lng', 'gender', 'verified', 'type',
        'dob', 'date', 'fcm_token', 'others', 'stripe_key', 'extra_field', 'status', 'member_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime:d/m/Y H:i',
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
        'status' => 'integer',
        'gender' => 'integer',
        'verified' => 'integer',
    ];

    public function simpanan()
    {
        return $this->hasMany(\App\Models\ViewSimpanan::class, 'anggota', 'id');
    }
}
