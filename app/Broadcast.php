<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Broadcast extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    public function broadcastType() {
        return $this->belongsTo(BroadcastType::class);
    }

    public function notificationType() {
        return $this->belongsTo(NotificationType::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
