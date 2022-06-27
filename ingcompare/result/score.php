<?php

function calculate_score($ingredients): array {
    $scores = [];
    foreach ($ingredients as $ingredient) {
        $scores[] = $ingredient['score'];
    }
    return array_count_values($scores);
}


function get_score_class($score): string {
    $score_css_classes = [
        1 => 'score--good',
        2 => 'score--good',
        3 => 'score--middle',
        4 => 'score--middle',
        5 => 'score--middle',
        6 => 'score--middle',
        7 => 'score--bad',
        8 => 'score--bad',
        9 => 'score--bad',
        10 => 'score--bad',
    ];

    for ($i = 10; $i > 0; $i--) {
        if (stristr($score, (string)$i)) {
            return $score_css_classes[$i];
        }
    }
    return '';
}

function compare_score($a, $b) {
    if (strpos($a, '?') !== false) return 1;
    if (strpos($b, '?') !== false) return -1;

    $a = preg_replace('/(\d\()|(\))/', '', $a);
    $b = preg_replace('/(\d\()|(\))/', '', $b);
    $a = preg_replace('/\d-/', '', $a);
    $b = preg_replace('/\d-/', '', $b);

    return strcasecmp($a, $b) * -1;
}

function render_scores($score_array): string {
    $html = "<div class='columns__item total__scores'>";

    uksort($score_array, "compare_score");

    foreach ($score_array as $score => $count) {
        $html .= "<p class='total__score'>                    
                    <span class = 'total__score-text score " . get_score_class($score) . "'>$score</span>
                    <span class = 'total__count-text'>×  $count</span>
                 </p> ";
    }
    return $html . "</div>";
}
