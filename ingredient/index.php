<?php

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
function get_information_about_ingredient($id, mysqli $db) {
    $sql = "SELECT * FROM ingredients WHERE id = '$id' ";

    $result = $db->query($sql);
    $row = mysqli_fetch_assoc($result);
    $id_cosing= $row['cosing'];

    $sql_cosing = "SELECT * FROM cosing WHERE id = '$id_cosing' ";
    $result_cosing = $db->query($sql_cosing);
    $cosing = mysqli_fetch_assoc($result_cosing);

    if (!$row){
        die('Не найдено');
    }
    $ingredient = [
        'name' => $row['name'],
        'fulldescription' => trim($row['fulldescription']),
        'cosing_inci' => trim($cosing['inci']) ?: '–',
        'cosing_description' => trim($cosing['description']) ?: '–',
        'cosing_cas' => trim($cosing['cas']) ?: '–',
        'cosing_es' => trim($cosing['es']) ?: '–',
        'cosing_functions' => trim($cosing['functions']) ?: '–',
    ];
    return $ingredient;
}

// Получаем информацию об ингредиенте
$db = db();
$information = get_information_about_ingredient($ing, $db);
$db->close();

//Функция, которая создает html
function render_list($ingredient) {
    $html ='
        <p class="intro__text">'. $ingredient['fulldescription'] .'</p>
        <p class="intro__text">Официальная информация COSING</p>
        <p class="intro__text"> INCI name: '. $ingredient['cosing_inci'] .'</p>
        <p class="intro__text"> All Functions: '. $ingredient['cosing_functions'] .'</p>
        <p class="intro__text"> Description: '. $ingredient['cosing_description'] .'</p>
        <p class="intro__text"> CAS #: '. $ingredient['cosing_cas'] .'</p>
        <p class="intro__text"> EC #: '. $ingredient['cosing_es'] .'</p>
    ';
    return $html;
}

$html_list = render_list($information);

$header = render_header('/ingredient');
$footer = render_footer();
$title = $information['name'];

$body = ' <div>' . $html_list . '</div>';


echo render_page($title, $header, $footer, $body);
