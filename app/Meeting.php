<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    protected $guarded = ['id'];

    /** A Term has a creator */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relations
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }


    //getters
    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

}
