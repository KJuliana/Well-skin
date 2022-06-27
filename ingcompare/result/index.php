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

// Парсим ввод (приводим к виду, удобному для дальнейшей работы с ним)
$search_list1 = parse_input($list1);
$search_list2 = parse_input($list2);

// Получаем итоговый список ингредиентов
$db = db();
$source1 = find_ingredients($search_list1, $db);
$source2 = find_ingredients($search_list2, $db);
$db->close();

function render_list($ingredients): string {
    $html = '';// html для списка ингридиентов

    foreach ($ingredients as $ingredient) {

        if (isset($ingredient['id'])) {
            $name = "<a class='ingredient__name' href='/ingredient/?ing=" . $ingredient['id'] . "'>" . $ingredient['name'] . "</a> ";
            $prefix = "founded";
        } else {
            $name= "<span class='ingredient__name'>". $ingredient['name'] . "</span>";
            $prefix = "";
        }

        $html = $html . "
            <li class='result-list__item ingredient $prefix'>
                <div class='ingredient__text'>
                    $name
                    <span class='ingredient__description'>" . $ingredient['description'] . "</span>
                </div>    
                <div class='ingredient__score score'>" . $ingredient['score'] . "</div>
            </li>";
    }
    return $html;
}

function calculate_score($ingredients): array
{
    $scores = [];
    foreach ($ingredients as $ingredient) {
        $scores[]= $ingredient['score'];
    }
    return array_count_values($scores);
}

$total_score1 = calculate_score($source1);
$total_score2 = calculate_score($source2);

function render_scores($score_array): string
{
    $html = "<div class='colomns__item total__scores'>";
    foreach ($score_array as $score => $count) {
        $html.= "<p class='total__score'>                    
                    <span class = 'total__score-text score'>$score</span>
                    <span class = 'total__count-text'>×  $count</span>
                 </p> ";
    }
    return $html."</div>";
}

$html_score1 = render_scores($total_score1);
$html_score2 = render_scores($total_score2);

// html для списка ингридиентов
$html_list_1 = render_list($source1);
$html_list_2 = render_list($source2);

$header = render_header('/ingcompare/result');
$footer = render_footer();
$title = "Результат сравнения";

$body = (
    "<div class='result'>
    <div class='colomns comparison--names'>
        <div class='colomns__item'>
            <div class='result__name'>$name1</div>
        </div>

        <div class='colomns__separator'></div>

        <div class='colomns__item'>
            <div class='result__name'>$name2</div>
        </div>
    </div>

    <div class=' colomns result-count'>
            <div class='total__count-text'>" . count($search_list1) . " </div>
            <div class='total__label'>Всего ингридиентов</div>
            <div class='total__count-text'>" . count($search_list2) . " </div>
    </div>

    <div class='colomns'>
            ". $html_score1 . "
            <div class='colomns__separator'></div>
            " . $html_score2 . "
    </div> 
    
    <div class='colomns'>
        <div class='colomns__item'>
            <ol class='result-list'>$html_list_1</ol>
        </div>

        <div class='colomns__separator'></div>

        <div class='colomns__item'>
            <ol class='result-list'>$html_list_2</ol>
        </div>
    </div> 
</div>"
);

echo render_page($title, $header, $footer, $body);