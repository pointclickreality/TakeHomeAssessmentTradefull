<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'body',
        'likes',
        'dislikes',
        'user_id',
        'comment_id',
        'product_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Only show undeleted comments
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->whereNull('comment_id')
            ->orderBy('created_at', 'desc');
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
     * Return replies to comments
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }

    /**
     * Comment author
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Comment product
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
