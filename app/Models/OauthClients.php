<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OauthClients
 * @package App\Models
 * @version December 10, 2017, 5:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection committeeMembers
 * @property \Illuminate\Database\Eloquent\Collection documents
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer user_id
 * @property string name
 * @property string secret
 * @property string redirect
 * @property boolean personal_access_client
 * @property boolean password_client
 * @property boolean revoked
 */
class OauthClients extends Model implements Auditable
{
//    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    public $table = 'oauth_clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'name',
        'secret',
        'redirect',
        'personal_access_client',
        'password_client',
        'revoked'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'secret' => 'string',
        'redirect' => 'string',
        'personal_access_client' => 'boolean',
        'password_client' => 'boolean',
        'revoked' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
