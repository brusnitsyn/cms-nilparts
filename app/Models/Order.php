<?php

namespace App\Models;

use App\Traits\Orderable;
use App\Traits\WithRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Orderable;
    use WithRelationships;

    protected static $relationships = [
        'user',
        'products',
        'status',
    ];

    protected $fillable = ['user_id', 'order_status_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products() {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function status() {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
}
