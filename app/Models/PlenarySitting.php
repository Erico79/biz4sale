<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PlenarySitting
 * @package App\Models
 * @version December 10, 2017, 9:50 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection committeeMembers
 * @property \Illuminate\Database\Eloquent\Collection Document
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string sitting_name
 * @property string description
 */
class PlenarySitting extends Model
{
    use SoftDeletes;

    public $table = 'plenary_sittings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sitting_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sitting_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class);
    }
}
