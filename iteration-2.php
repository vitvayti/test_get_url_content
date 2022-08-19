<?php
require($_SERVER['DOCUMENT_ROOT'].'/UrlContentPromises.php');
require($_SERVER['DOCUMENT_ROOT'].'/promises-master/src/Promise.php');

use GuzzleHttp\Promise\Promise;

$promise = new Promise();
$promise
    ->then(function ($value) {
        $obj = new UrlContentPromises($value);
        $arr = [
            ['Спб','1'],
            ['Сочи', 'Геленжик']
        ];
        $obj->getContent();
        $content = $obj->changeTextArr($arr);;
        echo $content;
        return $content;
    })
    ->then(function ($value) {
        $str1 = 'Сочи';
        $str2 = 'Геленжик';
        $content = str_replace($str1, $str1 . ' ' . $str2,$value);
        echo '<br>';
        echo $content;
    });
$promise->resolve($_SERVER['DOCUMENT_ROOT'].'/kbk.csv');