<?php

function parse_input(string $input) {
    $array = explode(', ', $input);

    for ($i = 0; $i < count($array); $i++) {
        $array[$i] = preg_replace('/\s*\(.+\)\s*/', '', $array[$i]);
    }

    return $array;
}
