
<?php
function remove_stop_words($words) {
    $stop_words = ["and", "the", "of", "in", "a", "to", "is", "with", "on", "for", "by", "at", "be", "an", "that", "this"];
    return array_diff($words, $stop_words);
}

function tokenize_text($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    return explode(" ", $text);
}

function calculate_word_frequency($words) {
    return array_count_values($words); 
}

function sort_word_frequency($wordFrequency, $sortOrder) {
    if ($sortOrder == "asc") {
        asort($wordFrequency); 
    } else {
        arsort($wordFrequency);
    }
    return $wordFrequency;
}
?>