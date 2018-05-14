<?php
/**
 * Created by Amirhossein Pooladvand
 */

namespace App\Http\Controllers\_Controller\Grid;

use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Grid extends Filter
{
    /**
     * Determines value of requested page to paginate
     *
     * @var int
     */
    protected $page;

    /**
     * Determines how many rows should be taken for the query
     *
     * @var int
     */
    protected $rows;

    /**
     * Indicates the column which is requested for sorting
     *
     * @var string
     */
    protected $sort;

    /**
     * Indicates the ordering of column which is only ASC or DESC
     *
     * @var string
     */
    protected $order;

    /**
     * Determines total number of records which exists in database
     *
     * @var int
     */
    protected $total;

    /**
     * @var \App\Http\Controllers\Controller
     *
     */
    private $controller;

    /**
     * @var \Illuminate\Http\Request
     *
     */
    private $request;

    public function __construct(Controller $controller, Request $request)
    {
        $this->controller = $controller;
        $this->request = $request;
    }

    /**
     * Prepare query for JEasyUi grid table
     *
     * @param Builder $query
     * @return array
     */
    public function items(Builder $query)
    {
        $this->page = $this->request->page;
        $this->rows = $this->request->rows;
        $this->total = $query->count();

        $this->filter($this->request, $query);

        $this->order($query);

        $query->skip(($this->page - 1) * $this->rows)->take($this->rows);

        return [
            'total' => $this->total,
            'rows' => $query->get()
        ];
    }

    /**
     * If there is an order request from the client, we order
     * and return the ordered query to user otherwise we return the query
     *
     * @param Builder $query
     * @return mixed
     */
    public function order(Builder $query)
    {
        $this->order = $this->request['order'];
        $this->sort = $this->request['sort'];

        if (!empty($this->sort) && !empty($this->order))
            return $query->orderBy($this->sort, $this->order);

        return $query;
    }

}