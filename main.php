<?php
echo '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Healthy Skin - сравни составы</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta name="description" content="Анализ и сраванение составов косметики">
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
            <a class="a-nav" href="" title="Как это работает?"> О проекте</a>
            <a class="a-nav" href="" title="Написать нам письмо"> Обратная связь</a>
            <a class="a-nav" href="" title="Будьте ближе"> Сообщество</a>
        </div>
    </header>
    <div class="compare">
        <div class="ins">
            <h4 class="text-ins-h4">Инструкция</h4>
            <p class="text-ins-p"> Ввведите составы косметики для анализа в соответсвующие поисковые поля поиска. Наибольшая достоверность будет достигнута,
                если вы введете состав в стандартном виде в соответствии с INCI (латинскими буквами).</p>
        </div>
        <form class="form_com" action="./compare.php" method="post">
            <div class="s1s2">
                <label>
                    <textarea name="list1" class="textarea" spellcheck="false" placeholder="Введите состав первого средства:"></textarea>
                </label>
                <label>
                    <textarea name="list2" class="textarea" spellcheck="false" placeholder="Введите состав второго средства:"></textarea>
                </label>
            </div>
            <button type="submit" class="button-compare" > Сравнить </button>
        </form>
    </div>
<!--    <div class="after">-->
<!--        <div class="components">-->
<!--            <h4>Популярные ингридиенты</h4>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!--            <p>Глицерин</p>-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="news">-->
<!--            <a href="https://www.gov.uk/government/news/herbal-skin-cream-found-to-contain-steroids"><img class="zudaifu" src="img/zudaifu.webp"> </a>-->
<!--        </div>-->
<!--    </div>-->

    <footer class="footer">
        <a class="a-nav" href="" title="Как это работает?"> О проекте</a>
        <a class="a-nav" href="" title="Написать нам письмо"> Обратная связь</a>
        <a class="a-nav" href="" title="Будьте ближе"> Сообщество</a>
    </footer>
</div>
</body>
</html>';