<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionTitle extends Model
{
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'title_id');
    }
}
