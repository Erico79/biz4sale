<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\UserResolver;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements Auditable, UserResolver
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable, HasApiTokens;

    /**
     * {@inheritdoc}
     */
    public static function resolveId()
    {

        return Auth::check() ? Auth::user()->getAuthIdentifier() : null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','masterfile_id','email_confirmed','password_changed','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function masterfile()
    {
        return $this->belongsTo('App\Models\MasterFile');
    }
}
