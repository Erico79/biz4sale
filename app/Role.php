<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const Seller = 'Seller';
    protected $guarded = ['id'];

    public function seller() {
        return self::where('code', self::Seller)->first();
    }
}
