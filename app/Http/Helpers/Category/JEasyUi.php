<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 4/12/2018
 * Time: 4:03 PM
 */

namespace App\Http\Helpers\Category;


class JEasyUi
{
    public static function jsonFormat(array $categories)
    {
        $cats = [];

        foreach ($categories as $key => $category) {

            $cats[] = [
                'id' => $category['id'],
                'text' => $category['title'],
                'state' => empty($category['children']) ? 'open' : 'closed'
            ];

            if (is_array($category['children'])) {
                $cats[$key]['children'] = self::jsonFormat($category['children']);
            }
        }

        return $cats;
    }
}