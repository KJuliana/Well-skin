<?php

function render_page(string $title, string $header_html, string $footer_html, string $body_html) {
    return "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>$title – Healthy Skin</title>
    <link rel='stylesheet' type='text/css' href='style.css'/>
    <meta name='description' content='Анализ и сраванение составов косметики'>
    <link href='img/cream.ico' rel='shortcut icon' type='image/x-icon'>
</head>

<body>
    <div class='root'>
        <header class='flex-header'>$header_html</header>    
        $body_html
        <footer class='footer'>$footer_html</footer>
    </div>
</body>
</html>";
}