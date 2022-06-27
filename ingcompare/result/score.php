<?php

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


function calculate_score($ingredients): array {
    $scores = [];
    foreach ($ingredients as $ingredient) {
        $scores[] = $ingredient['score'];
    }
    return array_count_values($scores);
}

function render_scores($score_array): string {
    $html = "<div class='columns__item total__scores'>";
    foreach ($score_array as $score => $count) {
        $html .= "<p class='total__score'>                    
                    <span class = 'total__score-text score " . get_score_class($score) . "'>$score</span>
                    <span class = 'total__count-text'>×  $count</span>
                 </p> ";
    }
    return $html . "</div>";
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
        if (stristr($score, $i)) {
            return $score_css_classes[$i];
        }
    }
    return '';
}
