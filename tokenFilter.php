<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 6/2/2018
 * Time: 2:44 PM
 */


function filtering($term)
{
    $conjungtion = array("though", "although", "even though", "while", "if", "only if",
        "until", "provided that", "assuming that", "if", "only if", "unless", "until", "provided that",
        "assuming that", "even if", "in case", "lest", "than", "rather than", "whether", "as much as",
        "whereas", "after", "as long as", "as soon as", "before", "by the time", "now that", "once", "since", "till",
        "until", "when", "whenever", "while", "a", "of", "as", "are", "in", "is", "it's");

    $i = 0;
    $paragraphs = array();
    foreach ($term as $sentences) {
        $paragraphs[$i] = array();
        $temp = $sentences;
        $j = 0;
        foreach ($temp as $item) {
            if (!in_array($item, $conjungtion)){
                $paragraphs[$i][$j] = $item;
            }
            $j++;
        }
        $i++;
    }

    return $paragraphs;
}

function toParagraph($text)
{
    $i = 0;
    $paragraphs = array();
    foreach ($text as $sentences) {
        $paragraphs[$i] = array();
        $temp = explode(" ", $sentences);
        $j = 0;
        foreach ($temp as $item) {
            if (is_null($item)) {
                unset($item);
            }
            if ($item != "" ) {
                $paragraphs[$i][$j] = $item;
            }
            if ($item == '\\'){
                unset($item);
            }
            $j++;
        }
        $i++;
    }
    return $paragraphs;
}