<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $province_city
 * @property mixed $province
 * @property bool|mixed $updated_at
 * @property string $gender_fa
 * @property bool|mixed $created_at
 * @property mixed $terms
 */
class Place extends Model
{
    protected $guarded = ['id'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function province_city()
    {
        return $this->belongsTo(ProvinceCity::class, 'province_city_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'place_id', 'id');
    }

    public function getGenderFaAttribute()
    {
        switch ($this->attributes['gender']) {
            case 'male':
                return 'آقا';
                break;
            case 'female':
                return 'خانم';
                break;
            default:
                return 'هردو';
        }
    }

    /**
     * @return bool|string
     */
    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

    public function getDetailPageAttribute()
    {
        return route('place.show', [$this->attributes['id'], str_slug_fa($this->attributes['title'])]);
    }

}
