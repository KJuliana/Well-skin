<?php

require_once('./components/footer.php');
require_once('./components/header.php');
require_once('./components/page.php');

$header = render_header('./contacts.php');
$footer = render_footer();
$title = "Обратная связь";

$body = "
<section class='intro'>
    <p class='intro__text'>Не связывайтесь со мной</p>
</section>";

echo render_page($title, $header, $footer, $body);
