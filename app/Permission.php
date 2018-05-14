<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public function title()
    {
        return $this->belongsTo(PermissionTitle::class, 'title_id');
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    public function getCreatedAtAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }
}
