<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id'
    ];

    /**
     * Returns data by products
     * @return Relation
     */
    public function products():Relation
    {
        return $this->hasMany(CartProduct::class)->select(['product_id', 'quantity']);
    }
}
