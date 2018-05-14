<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $blogs
 */
class Tag extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the news that are assigned this tag.
     */
    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public function audibles()
    {
        return $this->morphedByMany(Audible::class, 'taggable');
    }

    public function terms()
    {
        return $this->morphedByMany(Term::class, 'taggable');
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'taggable');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'taggable');
    }

    public function books()
    {
        return $this->morphedByMany(Book::class, 'taggable');
    }

    public function meetings()
    {
        return $this->morphedByMany(Meeting::class, 'taggable');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strFa($value);
        $this->attributes['slug'] = str_slug_fa(strFa($value));
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
