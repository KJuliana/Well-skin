<?php

$links = [
    '/main' => 'Сравнение составов',
    '/about' => 'О проекте',
    '/contacts' => 'Обратная связь',
]; // Объявление ассоциативного массива

function render_nav_link(string $url, string $name, bool $is_current) {
    if ($is_current) {
        return "<span class='nav__link nav__link--active'>$name</span>";
    }
    return "<a class='nav__link link' href='$url'>$name</a>";
} // Объявление функции, которая возвращает HTML строку с ссылкой, если она активна или со спаном, если мы находимся на этом url уже

function render_header(string $current_url) {  // Функция, которая выводит весь header в HTML
    $nav_links_html = "";

    global $links; //Добавляем для использования глобальную версию массива
    foreach ($links as $url => $name) {
        $nav_links_html .= render_nav_link($url, $name, $url === $current_url);
    } // Перебираем каждый элемент массива и с каждой итерацией добавляем в пустую строку $nav_links_html элемент <a>

    return " 
<header class='header'>
    <a class='logo' href='./main.php' aria-label='Главная'>
        <span class='logo__common'>
            <img class='logo__image' src='img/cream.ico' alt=''>
            <span class='logo__title'>Well Skin</span>
        </span>
        <span class='logo__description'>Анализ и сравнение косметики</span>
    </a>
    
    <nav class='nav'>$nav_links_html</nav>
</header>";
}