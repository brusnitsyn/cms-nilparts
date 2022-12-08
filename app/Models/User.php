<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\WithRelationships;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, WithRelationships;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            // $data = explode(' ', $model->name);
            // $model->firstname = $data[1];
            // $model->middlename = $data[2];
            // $model->lastname = $data[0];
        });

        static::updating(function($model) {
            // $data = explode(' ', $model->name);
            // $model->firstname = $data[1];
            // $model->middlename = $data[2];
            // $model->lastname = $data[0];
        });
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected static $relationships = [
        'attachments',
        'favorites',
//        'org',
        'orders',
        'products',
        'basket'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'call',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Получить все вложения пользователя.
     */
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    /**
     * Получить все "закладки" пользователя.
     */
    public function favorites()
    {
        return $this->morphMany(UserFavorite::class, 'favoriteable');
    }

    /**
     * Получить организацию пользователя.
     */
    // public function org()
    // {
    //     return $this->hasOneThrough(Org::class, OrgUser::class, 'user_id', 'id', 'id', 'org_id');
    // }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'pub_user_id', 'id');
        // return $products->paginate(16);
    }

    public function basket()
    {
        return $this->hasOne(Basket::class, 'user_id');
    }
}
