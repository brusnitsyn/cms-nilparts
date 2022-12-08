<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\WithRelationships;

class Org extends Model
{
    use HasFactory, WithRelationships;

    public static function boot()
    {
        parent::boot();

        static::created(function($model)
        {
            $model->slug = $model->id . '-' . $model->slug;
            $model->save();
        });

        static::updating(function($model) {
            $model->slug = $model->id . '-' . $model->slug;
        });
    }

    protected static $relationships = [
        'attachments',
        'type',
        'creator',
        'users',
        'products',
    ];

    protected $fillable = [
        'name',
        'slug',
        'inn',
        'ogrn',
        'desc',
        'kpp',
        'email',
        'call',
        'bank_bik',
        'bank_name',
        'bank_ks',
        'bank_rs',
        'creator_id',
        'type_id',
    ];

    /**
     * Получить все вложения организации.
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachmentable');
    }

    public function type()
    {
        return $this->hasOne(OrgType::class, 'id', 'type_id');
    }

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, OrgUser::class, 'org_id', 'id', 'id', 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'pub_org_id');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeSearch($query, ?string $name)
    {
        return $query->where('name', 'like', "%$name%")
            ->orWhere('inn', 'like', "%$name%");
    }
}
