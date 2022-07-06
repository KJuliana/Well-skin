<?php

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');
require_once('../@db/connect.php');

if (!isset($_GET['search_text'])) {
    die("Извините, идите обратно");
}

$search_text = trim($_GET['search_text']);

function search($search_text, mysqli $db): array {
    $found_list = [];// база с ингридиентами 1
    $sql = "SELECT id, name, description FROM ingredients
             WHERE (name LIKE '%$search_text%')
                OR (synonyms LIKE '%$search_text%')
                OR (description LIKE '%$search_text%')";
    $result = $db->query($sql);
    $query_result = [];

    if (mysqli_num_rows($result) > 0) {
        // вывод данных для каждой строки
        while ($row = mysqli_fetch_assoc($result)) {
            $found_ingredient = [
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
            ];
            $query_result[] = $found_ingredient;
        }
    }

    array_push($found_list, ...$query_result);

    return $found_list;
}

$db = db();
$found_list = search($search_text, $db);
$db->close();

function render_search($found_list): string {
    $html = '';// html для списка ингридиентов

    foreach ($found_list as $found_item) {
        $html = $html . "
            <li class='found-item'>
                <a class='found-item__name' href='/ingredient/?ing=" . $found_item['id'] . "'>" . $found_item['name'] . "</a>
                <span class='found-item__description'>" . $found_item['description'] . "</span>
            </li>";

    }
    return $html;
}

$found_html = render_search($found_list);

$header = render_header('/search');
$footer = render_footer();
$title = "Результат поиска";

$body = (
"<div class='result'>
    <ul class='found-list'>$found_html</ul>
</div>"
);

echo render_page($title, $header, $footer, $body);