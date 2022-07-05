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
</section>";

echo render_page($title, $header, $footer, $body);
