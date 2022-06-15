<?php

require_once('./components/footer.php');
require_once('./components/header.php');
require_once('./components/page.php');

$header = render_header();
$footer = render_footer();

$body = (
'<div class="compare">
    <div class="ins">
        <h4 class="text-ins-h4">Инструкция</h4>
        <p class="text-ins-p"> Ввведите составы косметики для анализа в соответсвующие поисковые поля поиска. Наибольшая достоверность будет достигнута,
            если вы введете состав в стандартном виде в соответствии с INCI (латинскими буквами).</p>
    </div>
    <form class="form_com" action="./compare.php" method="get">
        <div class="s1s2">
            <label>
                <textarea name="list1" class="textarea" spellcheck="false" placeholder="Введите состав первого средства:"></textarea>
            </label>
            <label>
                <textarea name="list2" class="textarea" spellcheck="false" placeholder="Введите состав второго средства:"></textarea>
            </label>
        </div>
        <button type="submit" class="button-compare" > Сравнить </button>
    </form>
</div>
<!--    <div class="after">-->
<!--        <div class="components">-->
<!--            <h4>Популярные ингридиенты</h4>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="news">-->
<!--            <a href="https://www.gov.uk/government/news/herbal-skin-cream-found-to-contain-steroids"><img class="zudaifu" src="img/zudaifu.webp"> </a>-->
<!--        </div>-->
<!--    </div>-->'
);


echo render_page("Сравнение составов", $header, $footer, $body);
