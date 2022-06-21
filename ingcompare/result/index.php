<?php

require_once('../../@components/footer.php');
require_once('../../@components/header.php');
require_once('../../@components/page.php');
require_once('../../@db/connect.php');
require_once('../../@db/find_ingredients.php');
require_once('./utils.php');

if (!isset($_GET['list1']) or !isset($_GET['list2']) or (!$_GET['list1']) or (!$_GET['list2'])) {
    die("Извините, идите обратно");
}

// Получаем названия товаров
$name1 = $_GET['name1'] ? htmlspecialchars($_GET['name1']) : 'Средство 1';
$name2 = $_GET['name2'] ? htmlspecialchars($_GET['name2']) : 'Средство 2';

//Получаем текст из окнон ввода
$list1 = htmlspecialchars($_GET['list1']);
$list2 = htmlspecialchars($_GET['list2']);

// Парсим(приводим к виду, удобному для дальнейшей работы с ним) ввод
$search_list1 = parse_input($list1);
$search_list2 = parse_input($list2);

// Получаем итоговый список ингредиентов
$db = db();
$source1 = find_ingredients($search_list1, $db);
$source2 = find_ingredients($search_list2, $db);
$db->close();

function render_list($ingredients) {
    $html = '';// html для списка ингридиентов

    foreach ($ingredients as $ingredient) {
        if ($ingredient['is_found']){
            $prefix = " 🥳 ";
        } else {
            $prefix = "";
        }

        $html = $html . "
            <li class='li_sostav'>
                <div class='sostav-a'>". $prefix . $ingredient['name'] . "</div>
                <div class='sost-span'>" . $ingredient['description'] . "</div>
            </li>";

    }

    return $html;
}

// html для списка ингридиентов
$html_list_1 = render_list($source1);
$html_list_2 = render_list($source2);

$header = render_header('/ingcompare/result');
$footer = render_footer();
$title = "Результат сравнения";

$body = (
    "<div class='result'>
    <div class='comparison comparison--names'>
        <div class='comparison__item'>
            <div class='result__name'>$name1</div>
        </div>

        <div class='comparison__separator'></div>

        <div class='comparison__item'>
            <div class='result__name'>$name2</div>
        </div>
    </div>

    <div class='total'>
        <div class='total__count'>" . count($search_list1) . "</div>
        <div class='total__label'>Всего ингридиентов</div>
        <div class='total__count'>" . count($search_list2) . "</div>
    </div>

    <div class='comparison'>
        <div class='comparison__item'>
            <ol class='result-list'>$html_list_1</ol>
        </div>

        <div class='comparison__separator'></div>

        <div class='comparison__item'>
            <ol class='result-list'>$html_list_2</ol>
        </div>
    </div>
</div>"
);

echo render_page($title, $header, $footer, $body);