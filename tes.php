<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 6/2/2018
 * Time: 1:52 PM
 */
include 'crawlerText.php';

$url = "http://localhost/SearchEngine/artikel.html";
$temp = explodeString($url);
foreach ($temp as $item){
    echo $item . "\n";
}