<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 6/3/2018
 * Time: 4:00 PM
 */


function wordStem($term){

    $i = 0;
    $paragraphs = array();
    foreach ($term as $sentences) {
        $paragraphs[$i] = array();
        $temp = $sentences;
        $j = 0;
        foreach ($temp as $item) {
            $word_to_stem = $item;
            $stem = PorterStemmer::Stem($word_to_stem);
            $paragraphs[$i][$j] = $stem;
            $j++;
        }
        $i++;
    }

    return $paragraphs;
}
