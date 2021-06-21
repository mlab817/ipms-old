<?php

/**
 * This function converts number formatted into string to float
 */
if (! function_exists('toFloat')) {
    function toFloat($value) {
        if (in_array(gettype($value), ['integer','double'])) {
            return $value;
        }

        return (float) str_replace(',', '', $value);
    }
}
