<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'cover'
    ];

    public function scopeDateDescending($query)
    {
        return $query->orderByDesc('created_at')->select(['id', 'title', 'price', 'cover', 'bonus_program'])->paginate(12);
    }

    public function scopeDateDescendingByIds($query, array $ids)
    {
        return $query->orderByDesc('created_at')->select(['id', 'title', 'price', 'cover', 'bonus_program'])->whereIn('id', $ids)->get();
    }

    public function cart() {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}
