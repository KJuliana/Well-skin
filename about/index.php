<?php

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');

$header = render_header('/about');
$footer = render_footer();
$title = "О проекте";

$body = "
<section class='intro'>
    <p class='intro__text'>Вот такой вот проект</p>
</section>";

echo render_page($title, $header, $footer, $body);
