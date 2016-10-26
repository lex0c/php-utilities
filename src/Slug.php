<?php

/**
* 
*/

class Slug
{
    /**
     * Convert the string to a slug
     * @param (string) $phrase to be converted
     * @param (string) $separator for slug
     * @return (string) slug
     */
    public static function convert($phrase, $extension=false, $separator='-')
    {
        $str = preg_replace(array(
            '/(á|à|ã|â|ä)/','/(Á|À|Ã|Â|Ä)/','/(é|è|ê|ë)/','/(É|È|Ê|Ë)/','/(í|ì|î|ï)/','/(Í|Ì|Î|Ï)/', 
            '/(ó|ò|õ|ô|ö)/','/(Ó|Ò|Õ|Ô|Ö)/','/(ú|ù|û|ü)/','/(Ú|Ù|Û|Ü)/','/(ñ)/','/(Ñ)/'), 
            explode(' ','a A e E i I o O u U n N'), 
            str_replace(' ', $separator, preg_replace('/\s+/', ' ', strtolower($phrase)))
        );
        
        if($extension):
            $phrase = explode('.', $str)[0];
            $ext = '.'.explode('.', $str)[1];
            return [$phrase, $ext];
        endif;

        return $str;
    }

}