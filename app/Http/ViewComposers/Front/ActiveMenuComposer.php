<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/6/2018
 * Time: 11:14 PM
 */

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;

class ActiveMenuComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $request = request();
        $route_name = $request->route()->getName();

        $route_name = explode('.', $route_name)[0];

        $view->with('_active_menu_data_id', $route_name);
    }
}