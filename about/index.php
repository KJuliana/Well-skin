<?php

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');

$header = render_header('/about');
$footer = render_footer();
$title = "О проекте";

$body = "
<section class='intro'>
    <p class='intro__text'>Данный проект реализован с целью повышения доступности и популяризации научного подхода при выборе косметических средств.</p>
</section>
<section class='intro'>
    <p class='intro__text'>Индексы </p>
</section>
<section class='intro'>
    <p class='intro__text'> Функции, которые отображаются на странице ингредиента, взяты из базы данных CosIng </p>
</section>
<section class='intro'>
    <p class='intro__text'> Таблица с рисками</p>
</section>
";


echo render_page($title, $header, $footer, $body);
