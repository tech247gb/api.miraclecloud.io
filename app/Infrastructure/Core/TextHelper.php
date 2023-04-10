<?php

namespace App\Infrastructure\Core;

/**
 * Class TextHelper
 * @package App\Infrastructure\Core
 */
class TextHelper
{
    /**
     * Strip tags, encode special characters.
     *
     * @param null|string $text
     * @return null|string
     */
    public static function sanitize(?string $text): ?string
    {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    /**
     * Strip tags, encode special characters.
     *
     * @param null|string $text
     * @return null|string
     */
    public static function slashes(?string $text): ?string
    {
        return filter_var($text, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * decode special characters and html entity.
     *
     * @param null|string $text
     * @return null|string
     */
    public static function decode(?string $text): ?string
    {
        return html_entity_decode($text, ENT_QUOTES | ENT_HTML401);
    }
}
