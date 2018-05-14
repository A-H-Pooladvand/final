<?php

namespace App\Http\Controllers;

use App\Http\Controllers\_Controller\CategoryHandler;
use App\Http\Controllers\_Controller\Grid\Grid;
use App\Http\Controllers\_Controller\TagHandler;
use App\Http\Controllers\_Controller\VisitHandler;
use Artesaos\SEOTools\Traits\SEOTools;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SEOToolsTrait;

    public function __construct()
    {
        $this->seo()->setCanonical(url()->current());
    }

    /**
     * JEasyUi's grid filters, search, sort and etc...
     *
     * @param Request $request
     * @return Grid
     */
    protected function getGrid(Request $request)
    {
        return new Grid($this, $request);
    }

    /**
     * Handling tags such as sync and attach to tag (polymorphic) table
     *
     * @param array $newTags
     * @return TagHandler
     */
    protected function tags(array $newTags = null)
    {
        return new TagHandler($this, $newTags);
    }

    /**
     * Whenever we want to create a new visit into out database
     * we use this class to handle and create new visit
     */

    public function visit()
    {
        return new VisitHandler($this);
    }

    public function setBreadcrumb($value)
    {
        view()->share('_page_breadcrumb', $value);
    }
}
