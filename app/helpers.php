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

if (! function_exists('shorten_value')) {
    function shorten_value($value = 0): string
    {
        if (! $value) {
            return (string) 0.0;
        }

        if ($value >= 10**9) {
            return (string) number_format($value / 10**9, 1) . 'B';
        }

        if ($value >= 10**6) {
            return (string) number_format($value / 10**6, 1) . 'M';
        }

        if ($value >= 10**3) {
            return (string) number_format($value / 10**3, 1) . 'K';
        }

        return (string) number_format($value, 1);
    }
}

if (! function_exists('nanoid')) {
    function nanoid(int $length = 21): string
    {
        $client = new \Hidehalo\Nanoid\Client();

        return $client->generateId($length, $mode = \Hidehalo\Nanoid\Client::MODE_DYNAMIC);
    }
}

if (! function_exists('generate_username')) {
    function generate_username($email = ''): string
    {
        $position = strpos($email, '@');

        return substr($email, 0, $position);
    }
}
