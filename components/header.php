<?php

$links = [
    './main.php' => 'Сравнение составов',
    './about.php' => 'О проекте',
    './contacts.php' => 'Обратная связь',
]; // Объявление ассоциативного массива

function render_nav_link(string $url, string $name) {
    return "<a class='a-nav' href='$url'>$name</a>";
} // Объявление функции, которая возвращает HTML строку с сыллкой

function render_header() {  // Функция, которая выводит весь header в HTML
    $nav_links_html = "";

    global $links; //Добавляем для использования глобальную версию массива
    foreach ($links as $url => $name) {
        $nav_links_html .= render_nav_link($url, $name);
    } // Перебираем каждый элемент массива и с каждой итерацией добавляем в пустую строку $nav_links_html элемент <a>

    return (
    "<a class= 'logo' href='' title='Главная'>
        <img class='img-logo' src='./img/cream.ico' alt=''>
        <div class='logo-span'>
            <span class='span-logo'>Healthy Skin</span>
            <span class='logo-describ'>Анализ и сравнение составов косметики</span>
        </div>
    </a>

    <div class='nav'>$nav_links_html</div>
    ");
}