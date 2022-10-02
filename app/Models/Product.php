<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_image',
        'likes',
        'dislikes',
        'price',
        'sales',
        'description',
        'product_category_id',
        'user_id',
        'status',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    /**
     * Product Category
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Product User
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Product Comments
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
}
