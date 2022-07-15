<?php

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');

$header = render_header('/contacts');
$footer = render_footer();
$title = "Обратная связь";

$body = "
<section class='intro'>
    <p class='intro__text'>По вопросам работы сервиса вы можете обращаться на <a class='link' href='mailto:korolevajuliana.inf@gmail.com?subject=Вопрос'>почту ✉️</a>.</p>
</section>";

echo render_page($title, $header, $footer, $body);
