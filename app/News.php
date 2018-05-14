<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'has_comment' => 'boolean'
    ];

    /** A news post has an author */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get all of the categories for the exam.
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the news's galleries.
     */
    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'gallery');
    }

    /**
     * Get all of the news's files.
     */
    public function files()
    {
        return $this->morphMany(File::class, 'file');
    }

    /**
     * Mutator SECTION
     *
     * Convert fields to persian and human readable format
     */

    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

    public function getPublishAtFaAttribute()
    {
        return jdate($this->attributes['publish_at'])->format('Y/m/d');
    }

    public function getExpireAtFaAttribute()
    {
        return jdate($this->attributes['expire_at'])->format('Y/m/d');
    }

    public function getStatusFaAttribute()
    {
        switch ($this->attributes['status']) {
            case 'publish':
                return 'منتشر شده';
                break;
            default:
                return 'پیش نویس';
        }
    }

    public function getHasCommentFaAttribute()
    {
        switch ($this->attributes['has_comment']) {
            case true:
                return 'فعال';
                break;
            default:
                return 'غیر فعال';
        }
    }
}
