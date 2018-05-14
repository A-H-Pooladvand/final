<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug_fa($value);
    }

    protected $casts = [
        'has_comment' => 'boolean'
    ];

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getGalleryTypeFaAttribute()
    {
        switch ($this->attributes['gallery_type']) {
            case 'none':
                return 'هیچکدام';
                break;
            case 'gallery':
                return 'گالری';
                break;
            case 'slider':
                return 'اسلاید شو';
                break;

        }
    }

    /**
     * Get all of the news's galleries.
     */
    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'gallery');
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
