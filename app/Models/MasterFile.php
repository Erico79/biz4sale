<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent as Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class MasterFile
 * @package App\Models
 * @version November 22, 2017, 9:56 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string surname
 * @property string firstname
 * @property string middlename
 * @property string gender
 * @property string national_id
 */
class MasterFile extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public $table = 'masterfiles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';



    public $fillable = [
        'surname',
        'firstname',
        'middlename',
        'gender',
        'national_id',
        'created_by',
        'phone_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'surname' => 'string',
        'firstname' => 'string',
        'middlename' => 'string',
        'gender' => 'string',
        'national_id' => 'string',
        'created_by' => 'integer',
        'phone_number' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'surname'=>'required',
        'firstname'=>'required',
        'gender'=>'required',
        'national_id'=>'required|min:8|unique:masterfiles,national_id',
        'phone_number'=>'required|unique:masterfiles,phone_number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\User::class);
    }

    public function user(){
        return $this->hasOne('App\User','masterfile_id');
    }


}
