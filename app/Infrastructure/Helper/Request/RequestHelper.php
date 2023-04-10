<?php

declare(strict_types=1);

namespace App\Infrastructure\Helper\Request;

use App\Infrastructure\Helper\Request\Configure\RequestConfigure;

class RequestHelper
{
    public static function sanitizeRequestArray(array $request, RequestConfigure $configure): array
    {
        foreach ($configure->defaultValues as $field => $defaultValue) {
            if (
                ! \array_key_exists($field, $request) ||
                null === $request[$field] ||
                '' === $request[$field]
            ) {
                $request[$field] = $defaultValue;
            }
        }

        foreach ($request as $key => $value) {
            if (\is_string($value)) {
                $value = self::sanitizeString($value, $configure);
                if (
                    \is_string($value) &&
                    \in_array($key, $configure->castFields, true)
                ) {
                    $value = self::castType($value);
                }
                $request[$key] = $value;
            }
        }

        return $request;
    }

    public static function sanitizeString(string $string, RequestConfigure $configure): ?string
    {
        if (
            '' === $string ||
            'null' === \mb_strtolower($string)
        ) {
            return null;
        }

        if ($configure->toUTF8) {

            $encoding = mb_detect_encoding($string, mb_detect_order(), true);
            if (false !== $encoding) {
                if (strcasecmp($encoding, 'UTF-8') !== 0) {
                    $string = iconv($encoding, "UTF-8//IGNORE", self::removeNotUTF($string));
                }
            } else {
                // TODO Hebrew is not converted (already converted on ???? )
                $string = \utf8_encode($string);
            }
        }

        return $configure->trim ? \trim($string) : $string;
    }

    public static function castType(string $string)
    {
        $value = \filter_var($string, FILTER_VALIDATE_INT);
        if (false !== $value) {
            return $value;
        }

        if (\is_numeric($string)) {
            return (float) $string;
        }

        if ('false' === \mb_strtolower($string)) {
            return false;
        }

        if ('true' === \mb_strtolower($string)) {
            return true;
        }
        return $string;
    }

    private static function removeNotUTF(string $string): string
    {
        $regex = <<<'END'
/
  (
    (?: [\x00-\x7F]                 # single-byte sequences   0xxxxxxx
    |   [\xC0-\xDF][\x80-\xBF]      # double-byte sequences   110xxxxx 10xxxxxx
    |   [\xE0-\xEF][\x80-\xBF]{2}   # triple-byte sequences   1110xxxx 10xxxxxx * 2
    |   [\xF0-\xF7][\x80-\xBF]{3}   # quadruple-byte sequence 11110xxx 10xxxxxx * 3
    ){1,100}                        # ...one or more times
  )
| .                                 # anything else
/x
END;
        return preg_replace($regex, '$1', $string);
    }
}
