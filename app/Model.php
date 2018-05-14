<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = [];

    /**
     * @return mixed
     * @author Alipuor
     */
    public static function getCategories()
    {
        return Category::where([
            'category_type' => get_called_class(),
        ])
            ->get(['id', 'title'])->toArray();
    }
}
