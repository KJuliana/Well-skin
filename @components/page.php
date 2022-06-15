<?php

function render_page(string $title, string $header_html, string $footer_html, string $body_html) {
    return "
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <title>$title – Well Skin</title>
    <link rel='stylesheet' type='text/css' href='/style.css'/>
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

</body>
</html>";
}