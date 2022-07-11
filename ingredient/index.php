<?php

use JetBrains\PhpStorm\ArrayShape;

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');
require_once('../@db/connect.php');

if (!isset($_GET['ing'])) {
    die('Не найдено');
}
// Получаем id ингридиента
$ing = htmlspecialchars($_GET['ing']);

//функция, которая получает данные
#[ArrayShape(['name' => "string", 'image' => "string", 'concerns' => "array", 'refs' => "string", 'full_description' => "string", 'cosing_inci' => "string", 'cosing_description' => "string", 'cosing_cas' => "string", 'cosing_ec' => "string", 'cosing_functions' => "string"])]
function get_information_about_ingredient($id, mysqli $db) {
    $sql = " SELECT i.id, i.name, i.image, i.refs, c.inci, c.description, c.cas, c.ec, c.functions, c.id as cosing_id  ,i.full_description FROM ingredients AS i  
                LEFT OUTER JOIN cosing AS c    
                ON i.cosing = c.id                                                                        
             WHERE i.id = '$id'";

    $result = $db->query($sql);
    $row = mysqli_fetch_assoc($result);

    $cosing_id = $row['cosing_id'];
    $sql_function = "SELECT functions.name, functions.description FROM con_f_c
                        RIGHT OUTER JOIN functions
                        ON functions.id = con_f_c.fun
                     WHERE con_f_c.cosing = '$cosing_id'";
    $result_function = $db->query($sql_function);

    if (!$row) {
        die('Не найдено');
    }

    $functions = [];
    while ($function = mysqli_fetch_assoc($result_function)) {
        $functions[] = [
            'name' => trim($function['name']),
            'description' => trim($function['description']),
        ];
    }

    $ingredient_id = $row['id'];
    $sql_concerns = "SELECT concerns.ru_name, concern_levels.name FROM concerns
                        RIGHT OUTER JOIN ingredient_concerns
                        ON ingredient_concerns.concern = concerns.id
                        LEFT OUTER JOIN concern_levels  
                        ON ingredient_concerns.level = concern_levels.id                                   
                     WHERE ingredient_concerns.ingredient = '$ingredient_id'";
    $result_concerns = $db->query($sql_concerns);

    $concerns = [];
    while ($concern = mysqli_fetch_assoc($result_concerns)) {
        $concerns[] = [
            'level' => trim($concern['name']),
            'name' => trim($concern['ru_name']),
        ];
    }

    return [
        'name' => $row['name'],
        'image' => $row['image'],
        'refs' => $row['refs'],
        'full_description' => trim($row['full_description']),
        'cosing_inci' => trim($row['inci']) ?: '–',
        'cosing_description' => trim($row['description']) ?: '–',
        'cosing_cas' => trim($row['cas']) ?: '–',
        'cosing_ec' => trim($row['ec']) ?: '–',
        'cosing_functions' => $functions,
        'concerns' => $concerns,
    ];
}

function render_concerns($concerns): string {
    $html = '<table class="table_concern"> 
                <tr><th>Опасность</th><th>Уровень</th></tr> ';
    foreach ($concerns as $concern) {
        $html .= '<tr><td><a href="/about" class="link">' . $concern['name'] . '</a></td><td><a href="/about" class="link">' . $concern['level'] . '</a></td></tr>';
    }
    return $html . '</table>';
}

function render_refs($refs): string {
    $html = '';
    $array_refs = explode(PHP_EOL, $refs);
    foreach ($array_refs as $ref) {
        $html .= '<li  class="ingredient-card__about__item"> ' . $ref . ' </li>';
    }
    return '<ol class="ingredient-card__about__list">' . $html . ' <li class="ingredient-card__about__text__item"> Изображение: PubChem </li> </ol>';
}

// Получаем информацию об ингредиенте
$db = db();
$information = get_information_about_ingredient($ing, $db);
$db->close();

function render_function_list($functions) {
    if (count($functions) < 1) return '–';
    $html = '';
    foreach ($functions as $index => $function) {
        $separator = ($index < count($functions) - 1 ? ', ' : '');
        $html .= "<span class='function'>
            <span class='function__name'>" . $function['name'] . "</span>$separator
            <span class='function__description'>" . $function['description'] . "</span>
        </span>";
    }
    return $html;
}

//Функция, которая создает html
function render_list($ingredient): string {
    return '
        <div class = "ingredient-card__about">
        <p class="ingredient-card__about__text">' . $ingredient['full_description'] . '</p>
        <p class="ingredient-card__about__text">' . render_concerns($ingredient['concerns']) . '</p>
        <p class="ingredient-card__about__header">Официальная информация COSING</p>
        <p class="ingredient-card__about__text"> INCI name: ' . $ingredient['cosing_inci'] . '</p>
        <p class="ingredient-card__about__text"> All Functions: ' . render_function_list($ingredient['cosing_functions']) . '</p>
        <p class="ingredient-card__about__text"> Description: ' . $ingredient['cosing_description'] . '</p>
        <p class="ingredient-card__about__text"> CAS #: ' . $ingredient['cosing_cas'] . '</p>
        <p class="ingredient-card__about__text"> EC #: ' . $ingredient['cosing_ec'] . '</p>
        <p class="ingredient-card__about__header"> Источники:</p>
        <p>' . render_refs($ingredient['refs']) . '</p>
        </div>
        <img class = "ingredient_image" src="' . $ingredient['image'] . '" alt="">
    ';
}

$html_list = render_list($information);

$header = render_header('/ingredient');
$footer = render_footer();
$title = $information['name'];

$body = ' <div class = "ingredient-card">' . $html_list . '</div>';


echo render_page($title, $header, $footer, $body);
