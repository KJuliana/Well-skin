<?php

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');
require_once('../@db/connect.php');

$header = render_header('/about');
$footer = render_footer();
$title = "О проекте";

function get_all_concerns(mysqli $db): array {
    $sql = "SELECT ru_name as name, description from concerns";
    $result = $db->query($sql);
    $concerns = [];
    while ($concern = $result->fetch_assoc()) {
        $concerns[] = $concern;
    };
    return $concerns;
}

function get_all_functions(mysqli $db): array {
    $sql = "SELECT name, description from functions";
    $result = $db->query($sql);
    $concerns = [];
    while ($concern = $result->fetch_assoc()) {
        $concerns[] = $concern;
    };
    return $concerns;
}

function render_concerns(array $concerns): string {
    $html = '';
    foreach ($concerns as $concern) {
        $html .= "<li><strong>" . trim($concern['name']) . ".</strong> <span>" . $concern['description'] . "</span>";
    }
    return $html;
}

function render_functions(array $functions): string {
    $html = '';
    foreach ($functions as $function) {
        $html .= "<li><strong>" . trim($function['name']) . ".</strong> <span>" . $function['description'] . "</span>";
    }
    return $html;
}

$db = db();
$concerns = get_all_concerns($db);
$functions = get_all_functions($db);
$db->close();

$body = "
<section class='about'>
    <p class='about__text'>
    Проект создан с целью повышения доступности и популяризации научного подхода при выборе косметических средств для ухода за кожей.
    Здесь вы можете более подробно познакомиться с данными, которые мы используем.
    Спасибо, что вы с нами!
    </p>
</section>

<section class='about'>
    <h2 class='about__title'>Индекс безопасности</h2>
    <p class='about__text'>Индекс безопасности отображает степень вероятности известных и предполагаемых рисков, связанных с ингредиентом.</p>
    
    <div class='score-groups'>
        <div class='score-groups__item score-groups__item--good'>
            <div class='score-groups__scores'>
                <span class='score score--good'>1</span>
                <span class='score score--good'>2</span>
            </div>
            <div class='score-groups__label'>Низкая опасность</div>
        </div>
        <div class='score-groups__item score-groups__item--middle'>
            <div class='score-groups__scores'>
                <span class='score score--middle'>3</span>
                <span class='score score--middle'>4</span>
                <span class='score score--middle'>5</span>
                <span class='score score--middle'>6</span>
            </div>
            <div class='score-groups__label'>Средняя опасность</div>
        </div>
        <div class='score-groups__item score-groups__item--bad'>
            <div class='score-groups__scores'>
                <span class='score score--bad'>7</span>
                <span class='score score--bad'>8</span>
                <span class='score score--bad'>9</span>
                <span class='score score--bad'>10</span>
            </div>
            <div class='score-groups__label'>Высокая опасность</div>
        </div>
    </div>
    
    <p class='about__text'>
        * Данные взяты с сайта <a class='link' href='https://www.ewg.org/skindeep/understanding_skin_deep_ratings/' target='_blank'>EWG's Skin Deep - индексы</a>
    </p>
</section>

<section class='about'>
    <h2 class='about__title'>CosIng</h2>
    <p class='about__text'>База данных CosIng (COSmetics INGredients) — это официальная база данных Европейской комиссии, объединяющая в себе информацию о косметических ингредиентах. Для того, чтобы более подробно ознакомиться с исследованиями по каждому ингредиенту, можно перейти на официальный сайт <a class='link' href='https://ec.europa.eu/growth/sectors/cosmetics/cosmetic-ingredient-database_en' target='_blank'>CosIng</a></p>
    <details class='spoiler'>
        <summary class='spoiler__button'>Функции CosIng</summary>
        <ul>" . render_functions($functions) . "</ul>
    </details>
</section>

<section class='about'>
    <h2 class='about__title'>Угрозы</h2>
    <p class='about__text'>
        EWG создала основную интегрированную базу данных о химических опасностях, нормативном статусе и доступности исследований, объединив данные почти 60 баз данных исследований официальных учреждений. EWG использует эти базы данных для оценки потенциальных опасностей для здоровья и пробелов в данных о косметических ингредиентах. Источники данных об индивидуальной токсичности, нормативных требованиях и доступности исследований, преведены на официальном сайте 
        <a class='link' href='https://www.ewg.org/skindeep/learn_more/about/' target='_blank'>EWG's Skin Deep - источники</a>
    </p>
    <details class='spoiler'>
        <summary class='spoiler__button'> Перечень угроз</summary>
        <ul>" . render_concerns($concerns) . "</ul>
    </details>
    <p class='about__text'>
        * Данные взяты с сайта <a class='link' href='https://www.ewg.org/skindeep/understanding_skin_deep_ratings/#ingredient-concerns' target='_blank'>EWG's Skin Deep - перечень угроз</a>
    </p>
</section>";


echo render_page($title, $header, $footer, $body);
