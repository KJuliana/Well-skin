<?php
function render_page(string $title, string $header_html, string $footer_html, string $body_html): string {
    $css_modify_time = filemtime($_SERVER['DOCUMENT_ROOT'] . '/style.css'); // для сброса кеша при изменении стилей
    return "
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,'>
    <title>$title – Well Skin</title>
    <link rel='stylesheet' type='text/css' href='/style.css?$css_modify_time'/>
    <meta name='description' content='Анализ и сраванение составов косметики'>
    <link href='/img/favicon-white.png' rel='shortcut icon' type='image/png'>
</head>

<body>

<div class='page'>
    <div class='page__header'>$header_html</div>

    <main class='page__content'>
        <h4 class='page__title'>$title</h4>
        $body_html
    </main>

    <div class='page__footer'>$footer_html</div>
</div>

<script src='/script.js' type='text/javascript'></script>

</body>
</html>";
}