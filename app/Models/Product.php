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
     *  Observe this model being deleted and delete the child shifts
     * @return void
     */
    public static function boot ():void
    {
        parent::boot();

        self::deleting(function (Product $product) {

            foreach ($product->comments as $comment)
            {
                $comment->delete();
            }
        });
    }
    /**
     * Simple function that adds a new like to the targeted comment
     * @return void
     */
    public function addLike(): void
    {
        $this->increment('likes');
    }

    /**
     * @return void
     */
    public function addDislike():void
    {
        $this->increment('dislikes');
    }

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
