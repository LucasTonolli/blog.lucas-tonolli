<?php

namespace App\Enum;

enum PostStatusEnum: string
{
    case Draft = 'draft';
    case Archive = 'archived';
    case Published = 'published';

    public function getLabel(): string
    {
        return match ($this) {
            self::Draft => 'Rascunho',
            self::Archive => 'Arquivado',
            self::Published => 'Publicado',
        };
    }
}
