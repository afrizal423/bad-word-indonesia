<?php

namespace afrizalmy\BWI;

use afrizalmy\BWI\trait\KumpulanKata;

class BadWord
{
    use KumpulanKata;

    /**
     * Menggunakan jarak Levenshtein distance untuk menghitung kemiripan kata
     *
     * @param array $wordCollect
     * @param string $word
     * @return boolean
     */
    public function Levenshtein(array $wordCollect, string $word): bool
    {
        foreach ($wordCollect as $bad) {
            if (levenshtein($word, $bad) <= 1) {
                return true;
            }
        }
        return false;
    }

    /**
     * Cek apakah kalimat mengandung kata kotor atau jorok atau kurang pantas
     *
     * @param string $kalimat
     * @return boolean
     */
    public static function cek(string $kalimat): bool
    {
        $wordCollect = (new self)->kata();
        $kalimat = explode(' ', $kalimat);
        foreach ($kalimat as $word) {
            foreach ((new self)->numToChar() as $key => $vokal) {
                $word = str_replace($key, $vokal, $word);
            }
            if (in_array(strtolower($word), $wordCollect)) {
                return true;
            }
            if ((new self)->Levenshtein($wordCollect, $word)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Mengganti huruf vocal dalam kata atau kalimat dengan karakter masking
     *
     * @param string $kata
     * @param string $masking
     * @return void
     */
    public static function masking(string $kata, $masking = '*', array $custom_word = [])
    {
        $words = explode(' ', $kata);
        $bad_words = (new self)->kata();
        $new_words = [];

        foreach ($words as $word) {
            $tmpword = $word;
            $word = preg_replace('/(.)\\1+/', "$1", $word);
            
            
            foreach ((new self)->numToChar() as $key => $vokal) {
                $word = str_replace($key, $vokal, $word);
            }

            if (in_array(strtolower($word), $bad_words) || (new self)->Levenshtein($bad_words, $word)) {
                $replaceString = str_ireplace(['a', 'i', 'u', 'e', 'o'], $masking, $tmpword);

                if (!strpos($replaceString, $masking)) {
                    $new_words[] = substr_replace($word, $masking, -1);
                } else {
                    $new_words[] = $replaceString;
                }
            } else {
                if (count($custom_word) > 0 && in_array(strtolower($word), $custom_word)) {
                    if (in_array(strtolower($word), $custom_word) || (new self)->Levenshtein($custom_word, $word)) {
                        $replaceString = str_ireplace(['a', 'i', 'u', 'e', 'o'], $masking, $tmpword);
        
                        if (!strpos($replaceString, $masking)) {
                            $new_words[] = substr_replace($word, $masking, -1);
                        } else {
                            $new_words[] = $replaceString;
                        }
                    } else {
                        $new_words[] = $tmpword;
                    }
                } else {
                    $new_words[] = $tmpword;
                }
            }

            
        }
        return implode(' ', $new_words);
    }
}
