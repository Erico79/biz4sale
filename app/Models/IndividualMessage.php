<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class IndividualMessage
 * @package App\Models
 * @version December 4, 2017, 8:40 pm UTC
 *
 * @property \App\Models\BroadcastType broadcastType
 * @property \App\Models\Broadcast broadcast
 * @property \App\Models\Document document
 * @property \App\Models\Masterfile masterfile
 * @property \Illuminate\Database\Eloquent\Collection committeeMembers
 * @property \Illuminate\Database\Eloquent\Collection documents
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer masterfile_id
 * @property integer document_id
 * @property integer broadcast_id
 * @property integer broadcast_type
 * @property boolean sent
 * @property boolean received
 */
class IndividualMessage extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    public $table = 'broadcast_individual_messages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'masterfile_id',
        'document_id',
        'broadcast_id',
        'broadcast_type',
        'sent',
        'received',
        'read',
        'document_type',
        'committee_document_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'masterfile_id' => 'integer',
        'document_id' => 'integer',
        'broadcast_id' => 'integer',
        'broadcast_type' => 'integer',
        'sent' => 'boolean',
        'received' => 'boolean',
        'read' => 'boolean',
        'committee_document_id'=>'integer',
        'document_type'=>'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function broadcast()
    {
        return $this->belongsTo(\App\Models\Broadcast::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function document()
    {
        return $this->belongsTo(\App\Models\Document::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function masterfile()
    {
        return $this->belongsTo(\App\Models\Masterfile::class);
    }
}
