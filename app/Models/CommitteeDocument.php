<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CommitteeDocument
 * @package App\Models
 * @version January 22, 2018, 6:52 am UTC
 *
 * @property \App\Models\CommitteeDocCategory committeeDocCategory
 * @property \App\Models\Session session
 * @property \Illuminate\Database\Eloquent\Collection committeeMembers
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer session_id
 * @property integer committee_doc_category
 * @property integer committee
 * @property string document_path
 * @property string|\Carbon\Carbon upload_date
 */
class CommitteeDocument extends Model
{
    use SoftDeletes;

    public $table = 'committee_documents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at','upload_date'];


    public $fillable = [
        'session_id',
        'committee_doc_category',
        'committee',
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
        'committee_doc_category' => 'integer',
        'committee' => 'integer',
        'document_path' => 'string'
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
    public function committeeDocCategory()
    {
        return $this->belongsTo(\App\Models\CommitteeDocCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function session()
    {
        return $this->belongsTo(\App\Models\Session::class);
    }
}
