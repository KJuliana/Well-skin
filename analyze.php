<?php

require_once('./components/footer.php');
require_once('./components/header.php');
require_once('./components/page.php');

$header = render_header();
$footer = render_footer();

$body = '
<div class="analyze">
    <h1 class="h1-an">Результаты анализа</h1>
        <div class="tube-image-an">
            <img class="tube-img" src="/img/yellow.png" alt="">
            <h3 class="tube-h3" >Тюбик 1</h3>
        </div>


    <div class="quick">
        <h2 class="h2-an">Краткое резюме</h2>
        <p class="p-an"> Здесь будет краткий итог
            Здесь будет краткий итог
            Здесь будет краткий итог
            Здесь будет краткий итог
            Здесь будет краткий итог
            Здесь будет краткий итог </p>
    </div>

    <div class="tags-an">
            <a class="tag-an">Без парабенов</a>
            <a class="tag-an">Может сушить кожу</a>
            <a class="tag-an">Мочевина</a>
            <a class="tag-an">Эко</a>
    </div>

    <p class="p-an"> Всего ингридиентов столько-то</p>

        <div class="sost-an">
            <a class="sostav-a">Вода <br> <span class="sost-span">Разжижает очень хорошо</span></a>
            <a class="sostav-a">Минеральное масло</a>
            <a class="sostav-a">Вода</a>
            <a class="sostav-a">Вода</a>
            <a class="sostav-a">Минеральное масло</a>
            <a class="sostav-a">Вода</a>
            <a class="sostav-a">Вода</a>
            <a class="sostav-a">Минеральное масло</a>
            <a class="sostav-a">Вода</a>

        </div>
    </div>
</div>';

echo render_page("Результаты анализа", $header, $footer, $body);
