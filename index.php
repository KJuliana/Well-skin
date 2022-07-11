<?php

require_once('./@components/footer.php');
require_once('./@components/header.php');
require_once('./@components/page.php');

$header = render_header('/');
$footer = render_footer();
$title = "Анализ и сравнение составов косметики";

$body = "
<section class='main'>
    <div class='main__intro'>
        <p class='main__text'>Научная&nbsp;основа. Грамотный&nbsp;выбор.</p>
        <p class='main__text'>Well Skin поможет вам найти идеальные продукты для вашего типа кожи и проблем.</p>
        <p class='main__text'>Выбирайте с умом</p>
        <p class='main__text'>Сравни свои любимые кремики ❤️</p>
        <p class='main__text'>
        <ul>
            <li>Сравни состав любимых кремиков ❤️</li>
            <li>Научная&nbsp;основа</li>
            <li>Грамотный&nbsp;выбор</li>
            <li></li>
        </ul>
        Сравни состав любимых кремиков ❤️</p>
    </div>
    <a class='main__button' href='/ingcompare'>Перейти к сравнению&nbsp;→</a> 
</section> 

";

echo render_page($title, $header, $footer, $body, "page--main");