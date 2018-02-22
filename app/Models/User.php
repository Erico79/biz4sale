<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class User
 * @package App\Models
 * @version November 27, 2017, 3:05 pm UTC
 *
 * @property \App\Models\Masterfile masterfile
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property string name
 * @property string email
 * @property string password
 * @property integer role_id
 * @property integer masterfile_id
 * @property boolean password_changed
 * @property boolean email_confirmed
 * @property boolean account_status
 * @property string remember_token
 */
class User extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'masterfile_id',
        'password_changed',
        'email_confirmed',
        'account_status',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'role_id' => 'integer',
        'masterfile_id' => 'integer',
        'password_changed' => 'boolean',
        'email_confirmed' => 'boolean',
        'account_status' => 'boolean',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function masterfile()
    {
        return $this->belongsTo(\App\Models\Masterfile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function audit(){
        return $this->hasOne('App\Models\User');
    }

}
