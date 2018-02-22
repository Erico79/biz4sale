<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class DocumentCategory
 * @package App\Models
 * @version November 30, 2017, 11:41 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection roleRoute
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string category_name
 */
class DocumentCategory extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    public $table = 'document_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'category_name','category_code','root_category','category_icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'root_category' => 'integer',
        'category_name' => 'string',
        'category_icon' => 'string',
        'category_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_name'=>'required',
        'category_code'=>'required',
//        'category_icon'=>'required',
//        'root_category'=>'required'
    ];
    public function document(){
        return $this->hasOne(\App\Models\Document::class,'document_category');
    }


    
}
