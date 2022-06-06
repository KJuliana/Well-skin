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
if (!isset($_GET['list1']) or !isset($_GET['list2']) or (!$_GET['list1']) or (!$_GET['list2'])) {
    die("Извините, идите обратно");
}
$list1 = htmlspecialchars($_GET['list1']);
$list2  = htmlspecialchars($_GET['list2']);



function parse_input($input){
    $array = explode(', ', $input);
    for ($i=0; $i<count($array); $i++ ){
        $array[$i] = preg_replace('/\s*\(.+\)\s*/', '', $array[$i]);
    }
    return $array ;
}

$search_list1=parse_input($list1);
$search_list2=parse_input($list2);

function search_in_db($ingredient_list,$conn){
    $result_list = [];// база с ингридиентами 1
    for ($i = 0; $i < count($ingredient_list); $i++) {
        $search_text = $ingredient_list[$i];
        if (strlen($search_text)<1){
            continue;
        }
        $sql = "SELECT id, name, description FROM ingredients WHERE name LIKE'%" . mysqli_real_escape_string($conn, $search_text) . "%'";
        $result = mysqli_query($conn, $sql);
        $query_result=[];
        if (mysqli_num_rows($result) > 0) {
            // вывод дынных для каждой строки
            while ($row = mysqli_fetch_assoc($result)) {
                $ingredient = array(
                    'name' => $row['name'],
                    'description' => $row['description']
                );
                array_push($query_result, $ingredient);
            }
        } else {
            array_push($query_result, array(
                'name' => $search_text,
                'description' => 'Не распознано😣')
            );
        }
        array_push($result_list,...$query_result);
    }
    return $result_list;
}

$source1 = search_in_db($search_list1,$conn);
$source2 = search_in_db($search_list2,$conn);

mysqli_close($conn);

function render_list_item($ingredients){
    $html= '';// html для списка ингридиентов
    foreach($ingredients as $ingredient){
        $html= $html."<li class='li_sostav'><div class='sostav-a'>".$ingredient['name']."</div><div class='sost-span'>".$ingredient['description']."</div></li>";
    }
    return $html;
}

$html_list_1 = render_list_item($source1);// html для первого списка ингридиентов
$html_list_2 = render_list_item($source2);// html для второго списка ингридиентов




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