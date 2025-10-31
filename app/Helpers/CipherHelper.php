<?php

namespace App\Helpers;

class CipherHelper
{
     // CAESAR CIPHER

    public static function caesarEncrypt($text, $shift)
    {
        $result = '';
        $shift = (int)$shift % 26;
        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $ascii = ord($char);
                $base = ctype_upper($char) ? 65 : 97;
                $result .= chr(($ascii - $base + $shift) % 26 + $base);
            } else {
                $result .= $char;
            }
        }
        return $result;
    }

    public static function caesarDecrypt($text, $shift)
    {
        return self::caesarEncrypt($text, 26 - ((int)$shift % 26));
    }

     // COLUMNAR TRANSPOSITION

    public static function columnarEncrypt($text, $key)
    {
        $key = preg_replace('/[^A-Za-z0-9]/', '', $key);
        $keyLength = strlen($key);
        $text = str_replace(' ', '', $text);
        $rows = ceil(strlen($text) / $keyLength);
        $matrix = array_chunk(str_split(str_pad($text, $rows * $keyLength, 'X')), $keyLength);

        $order = self::getKeyOrder($key);
        $cipher = '';

        foreach ($order as $index) {
            foreach ($matrix as $row) {
                $cipher .= $row[$index];
            }
        }

        return $cipher;
    }

    public static function columnarDecrypt($cipher, $key)
    {
        $key = preg_replace('/[^A-Za-z0-9]/', '', $key);
        $keyLength = strlen($key);
        $order = self::getKeyOrder($key);
        $rows = ceil(strlen($cipher) / $keyLength);
        $cols = $keyLength;
        $matrix = array_fill(0, $rows, array_fill(0, $cols, ''));

        $k = 0;
        foreach ($order as $index) {
            for ($r = 0; $r < $rows; $r++) {
                if ($k < strlen($cipher)) {
                    $matrix[$r][$index] = $cipher[$k++];
                }
            }
        }

        $plaintext = '';
        foreach ($matrix as $row) {
            $plaintext .= implode('', $row);
        }

        return rtrim($plaintext, 'X');
    }

    private static function getKeyOrder($key)
    {
        $order = range(0, strlen($key) - 1);
        $chars = str_split(strtolower($key));
        array_multisort($chars, SORT_ASC, $order);
        return $order;
    }

    // SCYTALE CIPHER

    public static function scytaleEncrypt($text, $key)
    {
        $key = max(1, (int)$key);
        $text = str_replace(' ', '', $text);
        $length = strlen($text);
        $rows = ceil($length / $key);
        $cipher = '';

        for ($i = 0; $i < $key; $i++) {
            for ($j = $i; $j < $length; $j += $key) {
                $cipher .= $text[$j];
            }
        }
        return $cipher;
    }

    public static function scytaleDecrypt($cipher, $key)
    {
        $key = max(1, (int)$key);
        $length = strlen($cipher);
        $rows = ceil($length / $key);
        $plaintext = array_fill(0, $rows, '');

        $k = 0;
        for ($i = 0; $i < $key; $i++) {
            for ($j = 0; $j < $rows; $j++) {
                if ($k < $length) {
                    $plaintext[$j] .= $cipher[$k++];
                }
            }
        }

        return implode('', $plaintext);
    }

      // (Triple Encryption)

    public static function tripleEncrypt($text, $key)
    {
        $step1 = self::caesarEncrypt($text, $key);
        $step2 = self::columnarEncrypt($step1, $key);
        $final = self::scytaleEncrypt($step2, $key);
        return $final;
    }

    public static function tripleDecrypt($text, $key)
    {
        $step1 = self::scytaleDecrypt($text, $key);
        $step2 = self::columnarDecrypt($step1, $key);
        $final = self::caesarDecrypt($step2, $key);
        return $final;
    }
}
 