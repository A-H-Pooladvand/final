<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Audible extends Model
{
    protected $guarded = ['id'];

    /** An audible has a creator */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** An audible has many polymorphic categories */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    /** An audible has many polymorphic tags */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /** An audible has polymorphic files */
    public function files()
    {
        return $this->morphMany(File::class, 'file');
    }

    /** An audible has polymorphic sounds */
    public function sounds()
    {
        return $this->morphMany(Sound::class, 'sound');
    }

    /** An audible has polymorphic videos */
    public function videos()
    {
        return $this->morphMany(Video::class, 'video');
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
