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

/**
 * This function converts markdown expression formatted into string to float
 */
if (! function_exists('markdown')) {
    function markdown($value): \Illuminate\Support\HtmlString
    {
        return \Illuminate\Mail\Markdown::parse($value);
    }
}
