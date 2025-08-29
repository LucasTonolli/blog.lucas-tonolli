<?php

namespace App\Filament\Dashboard\Resources\Posts\Schemas;

use App\Enum\PostStatusEnum;
use App\Models\Tag;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->label('Título'),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Categoria'),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Tags'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Conteúdo'),
                Select::make('status')
                    ->options(PostStatusEnum::options())
                    ->required(),
                DateTimePicker::make('published_at')
                    ->required()
                    ->label('Publicar em'),
            ]);
    }
}
