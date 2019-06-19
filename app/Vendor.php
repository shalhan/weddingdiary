<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class Vendor extends Authenticatable
{
    use Notifiable;

    protected $table = 'msvendor';
    protected $primaryKey = 'GUID';
    protected $fillable = ['VENDOR_NAME', 'VENDOR_WEBSITE', 'VENDOR_NAME2', 'VENDOR_BGLOGO', 'VENDOR_PREFIX', 'TOKEN', 'VENDOR_URL', 'email', 'password', 'VENDOR_LOGO'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;
    public function getByToken($token) {
        return $this->select("GUID")
                    ->where("TOKEN", $token)
                    ->first();
    }
}
