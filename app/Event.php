<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /** A event has many polymorphic categories */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    /** A course has a creator */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function province_city()
    {
        return $this->belongsTo(ProvinceCity::class, 'province_city_id');
    }

    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

    public function getReleasesAtFaAttribute()
    {
        return jdate($this->attributes['releases_at'])->format('Y/m/d');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
