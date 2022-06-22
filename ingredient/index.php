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

    if (!$row){
        die('Не найдено');
    }
    $ingredient = [
        'name' => $row['name'],
        'description' => $row['description'],
        'fulldescription' => $row['fulldescription'],
        'doing' => $row['doing'],
        'cosing' => $row['cosing'],
    ];
    return $ingredient;
}

// Получаем информацию об ингредиенте
$db = db();
$information = get_information_about_ingredient($ing, $db);
$db->close();

//Функция, которая создает html
function render_list($ingredient) {
    $html = '';// html для списка ингридиентов
    $html ='
        <p class="intro__text">' . $ingredient['description'] .'</p>
        <p class="intro__text">' . $ingredient['fulldescription'] .'</p>
        <p class="intro__text">' . $ingredient['doing'] .'</p>
        <p class="intro__text">' . $ingredient['cosing'] .'</p>
    ';
    return $html;
}

$html_list = render_list($information);

$header = render_header('/ingredient');
$footer = render_footer();
$title = $information['name'];

$body = ' <div>' . $html_list . '</div>';


echo render_page($title, $header, $footer, $body);
