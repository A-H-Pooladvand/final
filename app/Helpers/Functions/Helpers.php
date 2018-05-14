<?php

if ( ! function_exists('str_slug_fa')) {
    function str_slug_fa($title, $separator = '-')
    {
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator . 'at' . $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}

if ( ! function_exists('strFa')) {

    function strFa($arStr)
    {
        {
            $characters = [
                '٠' => '۰',
                '١' => '۱',
                '٢' => '۲',
                '٣' => '۳',
                '٤' => '۴',
                '٥' => '۵',
                '٦' => '۶',
                '٧' => '۷',
                '٨' => '۸',
                '٩' => '۹',
                'ء' => '',
                'إ' => 'ا',
                'أ' => 'ا',
                'بِ' => 'ب',
                'دِ' => 'د',
                'ذِ' => 'ذ',
                'زِ' => 'ز',
                'سِ' => 'س',
                'شِ' => 'ش',
                'ك' => 'ک',
                'ؤ' => 'و',
                'ى' => 'ی',
                'ي' => 'ی',
                'ئ' => 'ئ',
                'ة' => 'ه',
                'ۀ' => 'ه',

            ];
            return str_replace(array_keys($characters), array_values($characters), $arStr);
        }
    }
}

if ( ! function_exists('enNum')) {

    function enNum($faNumber)
    {
        $numbers = [
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9'
        ];
        return str_replace(array_keys($numbers), array_values($numbers), $faNumber);

    }
}

if ( ! function_exists('faNum')) {

    function faNum($enNumber)
    {
        $numbers = [
            '0' => '۰',
            '1' => '۱',
            '2' => '۲',
            '3' => '۳',
            '4' => '۴',
            '5' => '۵',
            '6' => '۶',
            '7' => '۷',
            '8' => '۸',
            '9' => '۹'
        ];
        return str_replace(array_keys($numbers), array_values($numbers), $enNumber);
    }
}

if ( ! function_exists('is_assoc')) {

    function is_assoc(array $array)
    {
        $keys = array_keys($array);

        return array_keys($keys) !== $keys;
    }

}
