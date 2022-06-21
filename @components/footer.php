<?php

$footer_links = [
    '/ingcompare' => 'Сравнение составов',
    '/about' => 'О проекте',
    '/contacts' => 'Обратная связь',
];

$copyright = '© Juliana Koroleva, 2022';

function render_footer(): string { // Возвращаем строку html с ссылками для футера
    global $footer_links, $copyright;

    $links_html = "";
    foreach ($footer_links as $url => $name) {
        $links_html .= "<a class='footer__link link' href='$url'>$name</a>";
    }

    return "
<footer class='footer'>
    <div class='footer__links'>$links_html</div>
    
    <div class='footer__copyright'>$copyright</div>
</footer>";
}