<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class BroadcastType extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    public function broadcasts() {
        return $this->hasMany(Broadcast::class);
    }
}
