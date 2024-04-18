<?php
// Custom Made Helper Functions

if (!function_exists('custom_print')) {
    function custom_print($value, $die = true) {
        echo "<pre>";
        echo print_r($value);
        if ($die == true) {
            die;
        }
    }
}

if (!function_exists('time_ago')) {
    function time_ago($time) {
        $difference = time() - $time;

        if ($difference < 1) {
            return "less than 1 second ago";
        }

        $condition = [
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second',
        ];

        foreach ($condition as $secs => $str) {
            $d = $difference / $secs;
            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
}
