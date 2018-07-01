<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 6/2/2018
 * Time: 12:37 PM
 */

$startLink = "http://localhost/SearchEngine/artikel2.html";

$searche = array();
$words = array();
$already_crawled = array();

$pdo = new PDO('mysql:host=localhost;dbname=searchengine', 'root', '');

function aDocuments($url)
{
    global $already_crawled;

    $options = array('http' => array('method' => "GET", 'headers' => "User-Agent: hiBot/0.1\n"));
    $context = stream_context_create($options);

    $doc = new DOMDocument();
    $doc->loadHTML(file_get_contents($url, false, $context));
    $linklist = $doc->getElementsByTagName("p");

    foreach ($linklist as $link) {
        $paragraph[] = $link->textContent;
    }

    // TODO:Heading belum diambil

    return $paragraph;

}

/*$resul = aDocuments($startLink);
print_r($resul);*/

