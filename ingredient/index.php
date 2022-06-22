<?php

use JetBrains\PhpStorm\ArrayShape;

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');
require_once('../@db/connect.php');

if (!isset($_GET['ing'])){
    die('Не найдено');
}
// Получаем id ингридиента
$ing = htmlspecialchars($_GET['ing']);

//функция, которая получает данные
#[ArrayShape(['name' => "string", 'full_description' => "string", 'cosing_inci' => "string", 'cosing_description' => "string", 'cosing_cas' => "string", 'cosing_es' => "string", 'cosing_functions' => "string"])]
function get_information_about_ingredient($id, mysqli $db) {
    $sql = " SELECT i.name, c.inci, c.description, c.cas, c.es, c.functions, c.id  ,i.full_description FROM ingredients AS i  
                LEFT OUTER JOIN cosing AS c    
                ON i.cosing = c.id                                                                        
             WHERE i.id = '$id'";

    $result = $db->query($sql);
    $row = mysqli_fetch_assoc($result);

    $cosing_id = $row['id'];
    $sql_function = "SELECT functions.name FROM con_f_c
                        RIGHT OUTER JOIN functions
                        ON functions.id = con_f_c.fun
                     WHERE con_f_c.cosing = '$cosing_id'";
    $result_function = $db->query($sql_function);

    if (!$row){
        die('Не найдено');
    }

    $functions = [];
    while ($function = mysqli_fetch_assoc($result_function)) {
        array_push($functions, trim($function['name']));
    }

    return [
        'name' => $row['name'],
        'full_description' => trim($row['full_description']),
        'cosing_inci' => trim($row['inci']) ?: '–',
        'cosing_description' => trim($row['description']) ?: '–',
        'cosing_cas' => trim($row['cas']) ?: '–',
        'cosing_es' => trim($row['es']) ?: '–',
        'cosing_functions' => count($functions)>0 ? implode(', ', $functions) : '–',
    ];
}

// Получаем информацию об ингредиенте
$db = db();
$information = get_information_about_ingredient($ing, $db);
$db->close();

//Функция, которая создает html
function render_list($ingredient): string {
    return '
        <p class="intro__text">'. $ingredient['full_description'] .'</p>
        <p class="intro__text">Официальная информация COSING</p>
        <p class="intro__text"> INCI name: '. $ingredient['cosing_inci'] .'</p>
        <p class="intro__text"> All Functions: '. $ingredient['cosing_functions'] .'</p>
        <p class="intro__text"> Description: '. $ingredient['cosing_description'] .'</p>
        <p class="intro__text"> CAS #: '. $ingredient['cosing_cas'] .'</p>
        <p class="intro__text"> EC #: '. $ingredient['cosing_es'] .'</p>
    ';
}

$html_list = render_list($information);

$header = render_header('/ingredient');
$footer = render_footer();
$title = $information['name'];

$body = ' <div>' . $html_list . '</div>';


echo render_page($title, $header, $footer, $body);
