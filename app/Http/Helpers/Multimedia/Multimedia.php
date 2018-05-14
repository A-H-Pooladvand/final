<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 3/28/2018
 * Time: 2:35 PM
 */

namespace App\Http\Helpers\Multimedia;


use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\Request;

class Multimedia
{
    /**
     * @param Request $request
     * @param MorphMany $query
     * @param int|integer $index
     * @param string $type
     * @return bool
     */
    public static function createOrUpdate(Request $request, MorphMany $query, int $index, string $type = 'gallery')
    {
        $index = (string)$index;

        $paths = $request['lfm_' . $type . '_path' . $index];
        $titles = $request['lfm_' . $type . '_title' . $index];
        $priorities = $request['lfm_' . $type . '_priority' . $index];

        if (empty($paths)) return false;

        $query->delete();
        foreach ($paths as $i => $path) {
            if (empty($path))
                continue;

            $query->create([
                'title' => $titles[$i],
                'priority' => $priorities[$i],
                'path' => $path,
            ]);
        }
    }
}