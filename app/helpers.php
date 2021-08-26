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

if (! function_exists('str_limit')) {
    function str_limit($value, $length = 60): string
    {
        return \Illuminate\Support\Str::limit($value, $length);
    }
}

/**
 * function first_sentence()
 *
 * @return string first sentence of the string
 */
if (! function_exists('first_sentence')) {
    function first_sentence($content = ''): string
    {
        $content = html_entity_decode(strip_tags($content));

        $pos = strpos($content, '.');

        if($pos === false) {
            return $content;
        }
        else {
            return substr($content, 0, $pos+1);
        }
    }
}
