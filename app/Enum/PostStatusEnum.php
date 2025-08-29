<?php

namespace App\Enum;

enum PostStatusEnum: string
{
    case Draft = 'draft';
    case Archived = 'archived';
    case Published = 'published';

    public function getLabel(): string
    {
        return match ($this) {
            self::Draft => 'Rascunho',
            self::Archived => 'Arquivado',
            self::Published => 'Publicado',
        };
    }

    public static function options(): array
    {
        return [
            self::Draft->value => self::Draft->getLabel(),
            self::Archived->value => self::Archived->getLabel(),
            self::Published->value => self::Published->getLabel(),
        ];
    }
}
