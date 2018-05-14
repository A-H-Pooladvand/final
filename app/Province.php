<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['title', 'code'];

    public function cities()
    {
        return $this->hasMany(ProvinceCity::class, 'province_id', 'id');
    }
}
