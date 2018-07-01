<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 6/3/2018
 * Time: 7:37 PM
 */

include "tokenFilter.php";
include "crawlerText.php";
include "stemming.php";
require_once 'PorterStemmer.php';

$url = "http://localhost/SearchEngine/artikel2.html";
$artikel = aDocuments($url);
$paragraphs = toParagraph($artikel);
$resultFiltering = filtering($paragraphs);
$resultStemming = wordStem($resultFiltering);

function analyze($inputText)
{
    global $paragraphs;

    $countWords = 0;
    $countDocument = 0;

    $arrayTF = array();
    foreach ($paragraphs as $term) {
        $temp = $term;
        $countWord = 0;
        foreach ($temp as $item) {
            if ($item == $inputText) {
                $countWord++;
                $countWords++;
            }
            $countDocument++;
        }
        $tf = $countWord / $countDocument;
        $arrayTF[] = $tf;
    }

    $sumDocs = count($arrayTF);
    $params = $sumDocs / $countWords;

    $resultIDF = log($params, 10);

    $arrayTfIdf = array();
    foreach ($arrayTF as $tf) {
        $arrayTfIdf[] = $tf * $resultIDF;
    }

    return $arrayTfIdf;

}

function explodeInput($text)
{
    $result = array();
    $inputText = explode(" ", $text);
    foreach ($inputText as $input) {
        $result[] = analyze($input);
    }
    return $result;
}
