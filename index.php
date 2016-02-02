<?php
/**
 * Created by PhpStorm.
 * User: enerjiser2
 * Date: 01.02.2016
 * Time: 23:52
 */

require_once __DIR__ . '/simple_html_dom.php';

$html = new simple_html_dom();

$html = file_get_html('http://routes.votpusk.ru/city.asp?rg=656&lt=%C0');
if($html->innertext!='' and count($html->find('a'))) {
    foreach($html->find('ul.filter li a') as $a){
        $addr = explode("//",$a->href)[1];
        echo $addr . '<br><br>';
        //getAbcNames(urlencode($a->href));
    }
}


exit;

$html->clear();
unset($html);

function getAbcNames($link)
{
    //загружаем в него данные
    $html = file_get_html($link);

    //находим все ссылки с названиями городов.
    if ($html->innertext != '' and count($html->find('a'))) {
        foreach ($html->find('ul.citylist li a') as $a) {
            echo $a . '<br>';
        }
    }
}
