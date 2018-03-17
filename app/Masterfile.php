<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterfile extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->hasOne(User::class);
    }
}
