<?php

if (!function_exists('get_query')) {
    function get_query($query)
    {
        if (!is_array($query)) {
            $conditions = json_decode($query, true);
        } else {
            $conditions = $query;
        }
        return $conditions;
    }
}

