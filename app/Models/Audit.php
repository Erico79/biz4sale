<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Audit
 * @package App\Models
 * @version November 28, 2017, 10:34 am UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer user_id
 * @property string event
 * @property integer auditable_id
 * @property string auditable_type
 * @property string old_values
 * @property string new_values
 * @property string url
 * @property string ip_address
 * @property string user_agent
 */
class Audit extends Model implements \OwenIt\Auditing\Contracts\Audit
{
//    use SoftDeletes;
    use \OwenIt\Auditing\Audit;

    public $table = 'audits';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public $fillable = [
        'user_id',
        'event',
        'auditable_id',
        'auditable_type',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'user_agent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'event' => 'string',
        'auditable_id' => 'integer',
        'auditable_type' => 'string',
        'old_values' => 'string',
        'new_values' => 'string',
        'url' => 'string',
        'ip_address' => 'string',
        'user_agent' => 'string'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
