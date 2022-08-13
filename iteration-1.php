<?php
require($_SERVER['DOCUMENT_ROOT'] . '/UrlContent.php');
$obj = new UrlContent($_SERVER['DOCUMENT_ROOT'] . '/kbk.csv');
$arr = [
    ['Спб', '1'],
    ['Сочи', 'Геленжик']
];
$obj->getContent();
echo $obj->changeTextArr($arr);
echo '<br>';
echo $obj->changeText('Сочи', 'Геленжик');
?>