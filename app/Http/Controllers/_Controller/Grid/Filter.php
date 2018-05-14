<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 1/22/2018
 * Time: 9:59 PM
 */

namespace App\Http\Controllers\_Controller\Grid;

use App\Http\Helpers\DateConverter\DateConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Filter
{
    /**
     * Indicates the field, operator and value of requested row of search
     *
     * @var array
     */
    protected $filter;

    protected function filter(Request $request, Builder $query)
    {
        $this->filter = json_decode($request['filterRules'], true);

        if ( ! $request->has('filterRules'))
            return $query;

        foreach ($this->filter as $i => $item) {

            // Try to convert the field to the date \
            try {
                $item['value'] = DateConverter::toGregorian($item['value'] . ' 00:00:00')->format('Y-m-d');
            } catch (\Exception $e) {

            }

            switch ($item['op']) {
                case 'contains':
                    $query->where($item['field'], 'LIKE', "%{$item['value']}%");
                    break;
                case 'equal':
//                    $query->where($item['field'], $item['value']);
                    $query->where($item['field'], 'LIKE', "%{$item['value']}%");
                    break;
                case 'notequal':
                    $query->where($item['field'], '<>', $item['value']);
                    break;
                case 'less':
                    $query->where($item['field'], '<', $item['value']);
                    break;
                case 'lessorequal':
                    $query->where($item['field'], '<=', $item['value']);
                    break;
                case 'greater':
                    $query->where($item['field'], '>', $item['value']);
                    break;
                case 'greaterorequal':
                    $query->where($item['field'], '>=', $item['value']);
                    break;
            }
        }

        return $query;
    }
}