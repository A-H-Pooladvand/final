<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/26/2018
 * Time: 3:03 PM
 */

namespace App\Http\Controllers\_Controller;


use App\Http\Controllers\Controller;
use App\Visit;
use bar\baz\source_with_namespace;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VisitHandler
{
    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Create a new visit based on what query is given to
     *
     * @param Request $request
     * @param Model $query
     * @param string
     */
    public function create(Request $request, Model $query, $namespace)
    {
        Visit::firstOrCreate([
            'visit_id' => $query->id,
            'visit_type' => $namespace,
            'ip' => $request->ip(),
            'agent' => $request->userAgent(),
            'visited_at' => Carbon::now()->format('Y-m-d')
        ]);
    }
}