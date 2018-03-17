<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const Seller = 'Seller';
    const Admin = 'Admin';

    protected $guarded = ['id'];

    public static function seller() {
        return self::where('code', self::Seller)->first();
    }

    public static function admin() {
        return self::where('code', self::Admin)->first();
    }
}
