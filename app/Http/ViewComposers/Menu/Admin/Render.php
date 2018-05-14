<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/6/2018
 * Time: 11:14 PM
 */

namespace App\Http\ViewComposers\Menu\Admin;

use Illuminate\View\View;

class Render
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $menus = require_once app_path('Http/ViewComposers/Menu/Admin/Admin.php');
        $view->with('sidebar_menus', $menus);
    }
}