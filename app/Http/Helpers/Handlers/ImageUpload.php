<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 4/8/2018
 * Time: 2:34 PM
 */

namespace App\Http\Helpers\Handlers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ImageUpload
{
    /**
     * First we check What is the method if request is post we simply
     * return the $request with name then we check if $request[$name]
     * is empty if so then we return query otherwise we return null
     *
     * @param Request $request
     * @param Model|null $query
     * @param string $name
     * @return mixed|null
     */
    public static function nullableImage(Request $request, Model $query = null, string $name = 'image')
    {
        if ($request->method() === 'POST') {
            return $request[$name];
        }

        return self::isNullRequest($request, $query, $name);
    }

    /**
     * Checks if there is a file in request or not.
     *
     * @param Request $request
     * @param Model $query
     * @return mixed|null
     */
    private static function isNullRequest(Request $request, Model $query, string $name)
    {
        if (empty($request[$name])) {
            return $query[$name];
        }

        return $request[$name];
    }
}