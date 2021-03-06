<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shengfan extends Model
{
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id','name'])->withDefault();
    }
}
