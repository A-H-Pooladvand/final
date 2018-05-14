<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/26/2018
 * Time: 2:23 PM
 */

namespace App\Observers;

use App\News;

class Visit
{
    /**
     * @param \App\Visit $visit
     */
    public function created(\App\Visit $visit)
    {
        if ($visit->visit_type === News::class)
            News::findOrFail($visit->visit_id)->increment('visits');

    }
}