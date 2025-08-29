<?php

namespace App\Filament\Dashboard\Resources\Posts\Pages;

use App\Filament\Dashboard\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
