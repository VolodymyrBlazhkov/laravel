<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const IMAGE = 'image';
    public const LIKES = 'likes';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbaks() : array
    {
        return [
            self::TITLE => [$this, 'tittle'],
            self::CONTENT => [$this, 'content'],
            self::IMAGE => [$this, 'image'],
            self::LIKES => [$this, 'likes'],
            self::CATEGORY_ID => [$this, 'category'],
        ];
    }

    public function tittle(Builder $builder, $value)
    {
        $builder->where( self::TITLE, 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where( self::CONTENT, 'like', "%{$value}%");
    }

    public function image(Builder $builder, $value)
    {
        $builder->where( self::IMAGE, 'like', "%{$value}%");
    }

    public function likes(Builder $builder, $value)
    {
        $builder->where( self::LIKES, 'like', "%{$value}%");
    }

    public function category(Builder $builder, $value)
    {
        $builder->where( self::CATEGORY_ID,  $value);
    }
}
