<?php

require_once('./@components/footer.php');
require_once('./@components/header.php');
require_once('./@components/page.php');

$header = render_header('/');
$footer = render_footer();
$title = "Анализ и сравнение составов косметики";

$body = "
<section class='intro'>
    <p class='intro__text'>Вот так вот оно работает</p>
</section>";

echo render_page($title, $header, $footer, $body);