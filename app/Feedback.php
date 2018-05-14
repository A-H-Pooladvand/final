<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    #public $timestamps = false;

    /* append get functions for attributes to object of class */
    protected $fillable = [
        'user_id', 'mobile', 'title', 'email', 'content', 'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | Set Password attribute
    |--------------------------------------------------------------------------
    | Parameters: {}
    | Return: nothing
    | Creator: Alipour.M on 11/05/1396
    | Editor: --- on ---
    */
    public function getMobileAttribute($value)
    {
        return $value != null ? str_pad((string)$value, 11, '0', STR_PAD_LEFT) : null;
    }
}
