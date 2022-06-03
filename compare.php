<?php

$servername = "localhost";
$username = "root";
$password = "7KoroJuli7";
$dbname = "HS";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$source1 = [];// база с ингридиентами 1
$source2 = [];// база с ингридиентами 2

$sql = "SELECT id, name, description FROM ingredients";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // вывод дынных для каждой строки
    while($row = mysqli_fetch_assoc($result)) {
        $ingredient = array(
            'name'=> $row['name'],
            'description'=> $row['description']
        );
        array_push($source1, $ingredient);
    }
}

$sql = "SELECT id, name, description FROM ingredients";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // вывод дынных для каждой строки
    while($row = mysqli_fetch_assoc($result)) {
        $ingredient = array(
            'name'=> $row['name'],
            'description'=> $row['description']
        );
        array_push($source2, $ingredient);
    }
}

mysqli_close($conn);


$html_list_1 = '';// html для первого списка ингридиентов
$html_list_2 = '';// html для второго списка ингридиентов

for($i=0;$i<count($source1); $i++){
    $s1=$source1[$i];
    $html_list_1= $html_list_1."<li class='li_sostav'><div class='sostav-a'>".$s1['name']."</div><div class='sost-span'>".$s1['description']."</div></li>";
}

for($i=0;$i<count($source2); $i++){
    $s2=$source2[$i];
    $html_list_2= $html_list_2."<li class='li_sostav'><div class='sostav-a'>".$s2['name']."</div><div class='sost-span'>".$s2['description']."</div></li>";
}


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
        <a class= "logo" href="./main.php"" title="Главная">
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
            <ul class="sost1">
                '.$html_list_1.'
            </ul>
            <ul class="sost2">
                '.$html_list_2.'
            </ul>
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