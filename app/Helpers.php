<?php

if (! function_exists('format_date')) {

    function format_date($date)
    {
       return (new DateTime($date))->format('d/m/Y');
    }
}

if (!function_exists('format_heure')) {
    function format_heure($heure)
    {
        return (new DateTime($heure))->format('H:i');
    }
}

