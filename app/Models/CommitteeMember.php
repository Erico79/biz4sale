<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CommitteeMember
 * @package App\Models
 * @version December 2, 2017, 5:39 am UTC
 *
 * @property \App\Models\Masterfile masterfile
 * @property \App\Models\Committee committee
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer committee_id
 * @property integer masterfile_id
 * @property string role
 */
class CommitteeMember extends Model
{
//    use SoftDeletes;

    public $table = 'committee_members';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'committee_id',
        'masterfile_id',
        'role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'committee_id' => 'integer',
        'masterfile_id' => 'integer',
        'role' => 'string'
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
    public function committee()
    {
        return $this->belongsTo(\App\Models\Committee::class);
    }
}
