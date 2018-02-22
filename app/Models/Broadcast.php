<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Broadcast
 * @package App\Models
 * @version December 3, 2017, 4:13 pm UTC
 *
 * @property \App\Models\BroadcastType broadcastType
 * @property \Illuminate\Database\Eloquent\Collection BroadcastIndividualMessage
 * @property \Illuminate\Database\Eloquent\Collection committeeMembers
 * @property \Illuminate\Database\Eloquent\Collection documents
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer user_group
 * @property string message
 * @property integer broadcast_type
 */
class Broadcast extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    public $table = 'broadcasts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_group',
        'message',
        'broadcast_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_group' => 'integer',
        'message' => 'string',
        'broadcast_type' => 'integer'
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
    public function broadcastType()
    {
        return $this->belongsTo(\App\Models\BroadcastType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function broadcastIndividualMessages()
    {
        return $this->hasMany(\App\Models\BroadcastIndividualMessage::class);
    }
}
