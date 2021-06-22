<?php

/**
 * This function converts number formatted into string to float
 */
if (! function_exists('toFloat')) {
    function toFloat($value) {
        if (in_array(gettype($value), ['integer','double'])) {
            return $value;
        }

        if (in_array(gettype($value), ['empty','null'])) {
            return $value;
        }

        $pattern = '/[^\d.]+/';

        return (float) preg_replace($pattern, '', $value);
    }
}
