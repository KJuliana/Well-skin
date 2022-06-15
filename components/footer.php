<?php

$footer_links = [
    './main.php' => 'Сравнение состава',
    './about.php' => 'О проекте',
    './contacts.php' => 'Обратная связь',
];

function render_footer(): string { // Возвращаем строку html с ссылками для футера
    global $footer_links;

    $links_html = "";
    foreach ($footer_links as $url => $name) {
        $links_html .= "<a class='a-nav' href='$url'>$name</a>";
    }

    return $links_html;
}