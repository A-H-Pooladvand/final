<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $categories
 * @property mixed $courses
 * @property mixed $place
 * @property mixed $user
 * @property bool|mixed $created_at
 * @property bool|mixed $updated_at
 * @property bool|mixed $start_at_fa
 * @property mixed $attributes
 * @property bool|mixed $end_at_fa
 * @property mixed $places
 * @property mixed $exams
 */
class Term extends Model
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

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_term', 'term_id', 'course_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function getStartAtFaAttribute()
    {
        return jdate($this->attributes['start_at'])->format('Y/m/d');
    }

    public function getEndAtFaAttribute()
    {
        return jdate($this->attributes['end_at'])->format('Y/m/d');
    }




}
