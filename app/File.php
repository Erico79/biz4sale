<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class File extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    public function broadcast() {
        return $this->belongsTo(Broadcast::class);
    }
}
