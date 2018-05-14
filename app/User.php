<?php

namespace App;

use App\Notifications\MailResetPasswordToken;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

/**
 * @property string $full_name
 * @property mixed $attributes
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes, LaratrustUserTrait;

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'family', 'username', 'mobile', 'phone', 'avatar', 'verifyToken',
        'is_active', 'type', 'province_city_id',
        'first_address', 'second_address', 'education', 'birth_certificate', 'national_id',
        'biography', 'birthday', 'artwork', 'scientific_document', 'province_city_id', 'province_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers_pivot', 'following_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers_pivot', 'follower_id', 'following_id');
    }

    public function city()
    {
        return $this->belongsTo(ProvinceCity::class, 'province_city_id');
    }

    public function educations()
    {
        return [
            [
                'title' => 'دیپلم',
                'value' => 'diploma'
            ],
            [
                'title' => 'کاردانی',
                'value' => 'associate'
            ],
            [
                'title' => 'کارشناسی',
                'value' => 'bachelor'
            ],
            [
                'title' => 'کارشناسی ارشد',
                'value' => 'master'
            ],
            [
                'title' => 'دکترا',
                'value' => 'doctoral'
            ],
            [
                'title' => 'فوق دکترا',
                'value' => 'post-doc'
            ],
        ];
    }

    /**
     * Returns user's full name
     *
     * @return string
     */
    public function fullName()
    {
        return $this->name . ' ' . $this->family;
    }

    /**
     * bcrypt User's Password whenever it wants to save.
     *
     * @param $password
     */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt(enNum($password));
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strFa($name);
    }

    public function setFamilyAttribute($family)
    {
        $this->attributes['family'] = strFa($family);
    }

    public function getCreatedAtAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }

    public function getDeletedAtAttribute()
    {
        switch ($this->attributes['deleted_at']) {
            case !null:
                return jdate($this->attributes['deleted_at'])->format('Y/m/d');
                break;
            default:
                return null;
        }
    }

    public function getDeletedAtStatusAttribute()
    {
        switch ($this->attributes['deleted_at']) {
            case null:
                return 'فعال';
                break;
            default:
                return 'غیر فعال';
        }
    }

    public function getFullNameAttribute(): string
    {
       return  $this->attributes['name'] . ' ' . $this->attributes['family'];
    }

    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }


}
