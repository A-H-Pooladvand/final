<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $category
 * @property mixed $user
 * @property bool|mixed $created_at
 * @property bool|mixed $updated_at
 * @property mixed $attributes
 * @property int $id
 */
class Book extends Model
{
    protected $guarded = ['id'];
    protected $table = 'books';
    protected $casts = [
        'options' => 'array'
    ];

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param Tag
     * @param string
     *
     * Books morphs to many tags --> Many To Many Polymorphic relation ship
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

    public function getExtensionAttribute()
    {
        if (!empty($this->attributes['file']))
        {
            return pathinfo($this->attributes['file'], PATHINFO_EXTENSION);
        }
        return null;
    }

}
