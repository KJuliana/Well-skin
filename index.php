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
    </div>
    <a class='main__button' href='/ingcompare'>Перейти к сравнению&nbsp;→</a> 
</section> 

";

echo render_page($title, $header, $footer, $body, "page--main");