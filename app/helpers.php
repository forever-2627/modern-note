<?php
/**
 * Created by PhpStorm.
 * User: 585
 * Date: 11/7/2024
 * Time: 3:50 AM
 */
if (!function_exists('truncate_words')) {
    function truncate_words($text, $limit = 40) {
        $words = explode(' ', $text);
        if (count($words) > $limit) {
            return implode(' ', array_slice($words, 0, $limit)) . '...';
        }
        return $text;
    }
}