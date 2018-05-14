<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $master
 * @property bool|mixed $created_at
 * @property bool|mixed $updated_at
 * @property mixed $attributes
 * @property mixed $category
 * @property int $id
 * @property mixed image
 */
class Course extends Model
{
    //options
    protected $guarded = ['id'];
    protected $table = 'courses';

    /** A course has many polymorphic categories */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    /** A course has a creator */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Course has many to many relationship with Term */
    public function terms()
    {
        return $this->belongsToMany(Term::class, 'course_term','course_id', 'term_id');
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
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
