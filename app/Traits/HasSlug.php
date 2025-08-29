<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (in_array('slug', $model->getFillable())) {
                $sourceField = in_array('title', $model->getFillable()) ? 'title' : 'name';
                $model->slug = $model->createUniqueSlug($model->$sourceField);
            }
        });
    }

    /**
     * Cria um slug único para o modelo.
     *
     * @param string $value O valor inicial para gerar o slug (ex: o título do post).
     * @return string O slug único gerado.
     */
    private function createUniqueSlug(string $value): string
    {

        $slug = Str::slug($value);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->where('id', '!=', $this->id)->exists()) {

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        return $slug;
    }
}
