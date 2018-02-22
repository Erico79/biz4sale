<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Document
 * @package App\Models
 * @version December 3, 2017, 4:19 pm UTC
 *
 * @property \App\Models\DocumentCategory documentCategory
 * @property \App\Models\Session session
 * @property \Illuminate\Database\Eloquent\Collection BroadcastIndividualMessage
 * @property \Illuminate\Database\Eloquent\Collection committeeMembers
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer session_id
 * @property integer document_category
 * @property integer user_group
 * @property string document_path
 * @property string|\Carbon\Carbon upload_date
 */
class Document extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
//    use SoftDeletes;

    public $table = 'documents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at','upload_date'];


    public $fillable = [
        'session_id',
        'plenary_sitting_id',
        'document_category',
        'user_group',
        'document_path',
        'upload_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'session_id' => 'integer',
        'plenary_sitting_id' => 'integer',
        'document_category' => 'integer',
        'user_group' => 'integer',
        'document_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'document_path'=>'required',
        'document_category'=>'required',
        'user_group'=>'required',
        'upload_date'=>'required',
        'session_id'=>'required',
        'plenary_sitting_id'=>'required'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function documentCategorys()
    {
        return $this->belongsTo(\App\Models\DocumentCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function session()
    {
        return $this->belongsTo(\App\Models\Session::class);
    }

    public function dCategory(){
        return $this->belongsTo('App\Models\DocumentCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function broadcastIndividualMessages()
    {
        return $this->hasMany(\App\Models\BroadcastIndividualMessage::class);
    }
}
