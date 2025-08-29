<?php

namespace App\Models;

use App\Enum\PostStatusEnum;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'published_at',
    ];

    public function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'status' => PostStatusEnum::class
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
