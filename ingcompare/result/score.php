<?php

function calculate_score_counts($ingredients): array {
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

function get_score_max(string $score): string {
    return preg_replace('/\d-/', '', $score);
}

function is_score_empty(string $score): string {
    return strpos($score, '?') !== false;
}

function compare_score($a, $b) {
    if (is_score_empty($a)) return 1;
    if (is_score_empty($b)) return -1;

    $maxA = get_score_max($a);
    $maxB = get_score_max($b);

    if ($maxA === $maxB) {
        return strcasecmp($a, $b) * -1;
    }
    return strcasecmp($maxA, $maxB) * -1;
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
