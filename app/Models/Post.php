<?php

namespace App\Models;

use App\Enum\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

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
}
