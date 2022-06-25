<?php

function find_ingredients($ingredient_list, mysqli $db): array {
    $result_list = [];// база с ингридиентами 1

    foreach ($ingredient_list as $ingredient) {
        $search_text = $db->real_escape_string($ingredient);
        if (strlen($search_text) < 1) {
            continue;
        }

        $sql = "SELECT id, name, synonyms, description, score FROM ingredients WHERE (name LIKE '%$search_text%') OR (synonyms LIKE '%$search_text%') OR (description LIKE '%$search_text%')";
        $result = $db->query($sql);
        $query_result = [];

        if (mysqli_num_rows($result) > 0) {
            // вывод данных для каждой строки
            while ($row = mysqli_fetch_assoc($result)) {
                $ingredient = [
                    'id' =>$row['id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'score' => $row['score']
                ];
                $query_result[] = $ingredient;
            }
        } else {
            $ingredient = [
                'name' => $search_text,
                'description' => 'Не распознано😣',
                'score' => '👽'
            ];
            $query_result[] = $ingredient;
        }
        array_push($result_list, ...$query_result);
    }
    return $result_list;
}