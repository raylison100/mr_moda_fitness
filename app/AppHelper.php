<?php

namespace App;

/**
 * Class Helper
 * @package App
 */
class AppHelper
{
    /**
     * @param $string
     * @return array|string|string[]|null
     */
    public static function removeSpecialCharacters($string): array|string|null
    {
        return preg_replace('/[^A-Za-z0-9]/', '', $string);
    }

    /**
     * @param $string
     * @return array|string|string[]|null
     */
    public static function removeAccentuation($string): array|string|null
    {
        return preg_replace([
            "/(á|à|ã|â|ä)/",
            "/(Á|À|Ã|Â|Ä)/",
            "/(é|è|ê|ë)/",
            "/(É|È|Ê|Ë)/",
            "/(í|ì|î|ï)/",
            "/(Í|Ì|Î|Ï)/",
            "/(ó|ò|õ|ô|ö)/",
            "/(Ó|Ò|Õ|Ô|Ö)/",
            "/(ú|ù|û|ü)/",
            "/(Ú|Ù|Û|Ü)/",
            "/(ñ)/",
            "/(Ñ)/"
        ], explode(" ", "a A e E i I o O u U n N"), $string);
    }

    /**
     * Price formatter
     *
     * @param $value
     * @return string
     */
    public static function formatPrice($value): string
    {
        if (str_contains($value, '.')) {
            $exp = explode('.', $value);

            if (mb_strlen($exp[1]) == 1) {
                $decimal = $exp[1] . '0';
            } else {
                $decimal = $exp[1];
            }

            $price = $exp[0] . $decimal;
        } else {
            $price = $value . '00';
        }

        return $price;
    }

    /**
     * Insert blank spaces into string
     *
     * @param $quantity
     * @return string
     */
    public static function insertSpace($quantity): string
    {
        $spaces = '';

        for ($i = 0; $i < $quantity; $i++) {
            $spaces .= ' ';
        }

        return $spaces;
    }

    /**
     * Remove blank spaces into string
     *
     * @param $value
     * @return string
     */
    public static function removeSpaces($value): string
    {
        return trim(str_replace(" ", "", $value));
    }

    /**
     * Insert characters to the left side of string
     *
     * @param $value
     * @param $qtd
     * @param $char
     * @param bool $custom
     * @return string
     */
    public static function insertChar($value, $qtd, $char, bool $custom = false): string
    {
        if (mb_strlen($value) > $qtd) {
            return substr($value, 0, $qtd);
        }

        $quantity = $qtd - mb_strlen($value);

        $return = str_repeat($char, $quantity);

        if ($custom) {
            return $value . $return;
        }

        return $return . $value;
    }

    /**
     * Read array and return this values
     *
     * @param $values
     * @return string $result
     */
    public static function getValues($values): string
    {
        return implode('', $values);
    }

    /**
     * Check if is a valid date
     *
     * @param $date
     * @return bool
     */
    public static function isValidDate($date): bool
    {
        return preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date);
    }

    /**
     * @param $date
     * @return false|string
     */
    public static function formatDateDB($date): bool|string
    {
        return (self::isValidDate($date)) ? $date : date("Y-m-d", strtotime($date));
    }

    /**
     * Return age by date of birth
     *
     * @param $dateBirth
     * @return int|null
     */
    public static function getAgeByDateBirth($dateBirth): ?int
    {
        return (empty($dateBirth)) ? null : date_diff(date_create($dateBirth), date_create('now'))->y;
    }

    /**
     * @param $text
     * @return false|string
     */
    public function encrypt($text): bool|string
    {
        $key = env('APP_KEY');
        $iv = env('APP_NAME');
        $method = 'aes-256-cbc';

        return openssl_encrypt($text, $method, $key, OPENSSL_KEYTYPE_RSA, $iv);
    }

    /**
     * @param $text
     * @return false|string
     */
    public function decrypt($text): bool|string
    {
        $key = env('APP_KEY');
        $iv = env('APP_NAME');
        $method = 'aes-256-cbc';

        return openssl_decrypt($text, $method, $key, OPENSSL_KEYTYPE_RSA, $iv);
    }
}
