<?php
echo '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Результат сравнения</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link href="img/cream.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<div class="root">
    <header class="flex-header">
        <a class= "logo" href="" title="Главная">
            <img class="img-logo" src="./img/cream.ico" alt="">
            <div class="logo-span">
                <span class="span-logo">Healthy Skin</span>
                <span class="logo-describ">Анализ и сравнение составов косметики</span>
            </div>
        </a>

        <div class="nav">
            <a class="a-nav" href="./main.php" title="Как это работает?"> О проекте</a>
            <a class="a-nav" href="./main.php" title="Написать нам письмо"> Обратная связь</a>
            <a class="a-nav" href="./main.php" title="Будьте ближе"> Сообщество</a>
        </div>
    </header>
    <div class="compararison">
        <h1 class="h1-com">Результаты сравнения</h1>
        <div class="images-com">
            <div class="tube-image-com">
                <img class="tube-img" src="./img/blue.png" alt="">
                <h3 class="tube-h3" >Тюбик 1</h3>
            </div>
            <img class="vs-img" src="./img/vs.png" alt="">
            <div class="tube">
                <img class="tube-img" src="./img/green.png" alt="">
                <h3 class="tube-h3">Тюбик 1</h3>
            </div>
        </div>
        <div class="quick">
            <h2 class="h2-com">Краткое резюме</h2>
            <p class="p-com"> Здесь будет краткий итог по сравнению средств </p>
        </div>

        <div class="tags">
            <div class="tag1">
                <a class="tag-an">Без парабенов</a>
                <a class="tag-an">Может сушить кожу</a>
                <a class="tag-an">Мочевина</a>
                <a class="tag-an">Эко</a>
            </div>
            <div class="tag2">
                <a class="tag-an">Без парабенов</a>
                <a class="tag-an">Может сушить кожу</a>
                <a class="tag-an">Мочевина</a>
                <a class="tag-an">Эко</a>
                <a class="tag-an">Без парабенов</a>
                <a class="tag-an">Может сушить кожу</a>
                <a class="tag-an">Мочевина</a>
                <a class="tag-an">Эко</a>
            </div>

        </div>

        <p class="p-com"> Всего ингридиентов</p>

        <div class="sostav">
            <div class="sost1">
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>
            </div>
            <div class="sost2">
                <a class="sostav-a">Вода <br> <span class="sost-span">Разжижает очень хорошо</span></a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Вода</a>
                <a class="sostav-a">Минеральное масло</a>
                <a class="sostav-a">Вода</a>

            </div>
        </div>
    </div>

    <footer class="footer">
        <a class="a-nav" href="./main.php" title="Как это работает?"> О проекте</a>
        <a class="a-nav" href="./main.php" title="Написать нам письмо"> Обратная связь</a>
        <a class="a-nav" href="./main.php" title="Будьте ближе"> Сообщество</a>
    </footer>
</div>
</body>
</html>
';