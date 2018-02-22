<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function routes() {
        return $this->belongsToMany(Route::class);
    }

    public function user(){
        return $this->hasOne('App\User','role_id');
    }
}
