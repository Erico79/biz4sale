<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RoleRoute
 * @package App\Models
 * @version November 28, 2017, 2:27 pm UTC
 *
 * @property \App\Models\Route route
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer route_id
 */
class RoleRoute extends Model implements Auditable
{
//    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    public $table = 'role_route';
    
//    const CREATED_AT = 'created_at';
//    const UPDATED_AT = 'updated_at';
//
//
//    protected $dates = ['deleted_at'];


    public $fillable = [
        'route_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'route_id' => 'integer'
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
    public function route()
    {
        return $this->belongsTo(\App\Models\Route::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }
}
