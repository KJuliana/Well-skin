<?php
$links = [
    '/ingcompare' => 'Сравнение составов',
    '/about' => 'О проекте',
    '/contacts' => 'Обратная связь',
];

// Объявление функции, которая возвращает HTML строку с ссылкой, если она активна или со спаном, если мы находимся на этом url уже
function render_nav_link(string $url, string $name, bool $is_current): string {
    if ($is_current) {
        return "<span class='nav__link nav__link--active'>$name</span>";
    }
    return "<a class='nav__link' href='$url'>$name</a>";
}

// Перебираем каждый элемент массива и с каждой итерацией добавляем в пустую строку $nav_links_html элемент <a>
function render_header(string $current_url): string {  // Функция, которая выводит весь header в HTML
    $nav_links_html = "";

    global $links; //Добавляем для использования глобальную версию массива
    foreach ($links as $url => $name) {
        $nav_links_html .= render_nav_link($url, $name, $url === $current_url);
    }

    $search_text = $_GET['search_text'] ?? '';

    return "
<header class='header'>
    <a class='logo' href='/' aria-label='Главная'>
        <span class='logo__common'>
            <span class='logo__title'>Well Skin</span>
        </span>
        <span class='logo__description'>Анализ и сравнение косметики</span>
    </a>
   
    <button id='burger' class='header__burger' aria-hidden='true' tabindex='-1'>
        <span></span>
    </button>

    <nav id='nav' class='nav'>
        <form class='search' action='/search' method='get'>
            <input class='search__input-text' name='search_text' type='search' placeholder='Поиск' value='$search_text' autocomplete='off' required />
            <button type='submit' class='search__button'>🔍</button>
        </form>
        <div class ='nav__links'>
        $nav_links_html
        </div>
    </nav>
</header>";
}
