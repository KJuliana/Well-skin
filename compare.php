<?php

require_once('./components/footer.php');
require_once('./components/header.php');
require_once('./components/page.php');

$servername = "localhost";
$username = "root";
$password = "7KoroJuli7";
$dbname = "HS";

// Подключаемся к MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем связь с базой
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!isset($_GET['list1']) or !isset($_GET['list2']) or (!$_GET['list1']) or (!$_GET['list2'])) {
    die("Извините, идите обратно");
}

$name1 = $_GET['name1'] ? htmlspecialchars($_GET['name1']) : 'Средство 1';
$name2 = $_GET['name2'] ? htmlspecialchars($_GET['name2']) : 'Средство 2';

//Получаем текст из окнон ввода
$list1 = htmlspecialchars($_GET['list1']);
$list2 = htmlspecialchars($_GET['list2']);


function parse_input($input) {
    $array = explode(', ', $input);
    for ($i = 0; $i < count($array); $i++) {
        $array[$i] = preg_replace('/\s*\(.+\)\s*/', '', $array[$i]);
    }
    return $array;
}

$search_list1 = parse_input($list1); // Парсим(приводим к виду, удобному для дальнейшей работы с ним) ввод
$search_list2 = parse_input($list2);

function search_in_db($ingredient_list, $conn) {
    $result_list = [];// база с ингридиентами 1
    for ($i = 0; $i < count($ingredient_list); $i++) {
        $search_text = mysqli_real_escape_string($conn, $ingredient_list[$i]);
        if (strlen($search_text) < 1) {
            continue;
        }

        $sql = "SELECT id, name, synonyms, description FROM ingredients WHERE (name LIKE '%$search_text%') OR (synonyms LIKE '%$search_text%')";
        $result = mysqli_query($conn, $sql);
        $query_result = [];
        if (mysqli_num_rows($result) > 0) {
            // вывод дынных для каждой строки
            while ($row = mysqli_fetch_assoc($result)) {
                $ingredient = array(
                    'name' => $row['name'],
                    'description' => $row['description']
                );
                array_push($query_result, $ingredient);
            }
        } else {
            array_push($query_result, array(
                    'name' => $search_text,
                    'description' => 'Не распознано😣')
            );
        }
        array_push($result_list, ...$query_result);
    }
    return $result_list;
}

$source1 = search_in_db($search_list1, $conn);  //Получаем итоговый список ингредиентов
$source2 = search_in_db($search_list2, $conn);

mysqli_close($conn);

function render_list_item($ingredients) {
    $html = '';// html для списка ингридиентов
    foreach ($ingredients as $ingredient) {
        $html = $html . "<li class='li_sostav'><div class='sostav-a'>" . $ingredient['name'] . "</div><div class='sost-span'>" . $ingredient['description'] . "</div></li>";
    }
    return $html;
}

$html_list_1 = render_list_item($source1);// html для списка ингридиентов
$html_list_2 = render_list_item($source2);

$header = render_header('./compare.php');
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