<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 3/8/2018
 * Time: 4:58 PM
 */

namespace App\Http\Helpers\DateConverter;


use DateTime;
use Illuminate\Http\Request;
use Morilog\Jalali\jDateTime;

class DateConverter
{
    /**
     * @param $date
     * @return DateTime
     */
    public static function toGregorian($date): DateTime
    {
        return jDateTime::createDatetimeFromFormat('Y/m/d H:i:s', $date);
    }

    /**
     * @param Request $request
     * @param array[] $dates
     * @return void
     */
    public static function toGregorianAndMerge(Request $request, array $dates)
    {
        foreach ($dates as $key => $value) {
            $request->merge([$key => jDateTime::createDatetimeFromFormat('Y/m/d H:i:s', $value)]);
        }
    }
}