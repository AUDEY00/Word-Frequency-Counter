
<?php
function remove_stop_words($words) {
    $stop_words = ["and", "the", "of", "in", "a", "to", "is", "with", "on", "for", "by", "at", "be", "an", "that", "this","it","are","those","what"];
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $text = $_POST['text'];
    $sortOrder = $_POST['sort'];
    $limit = $_POST['limit'];

    // Validate input
    if (empty($text)) {
        echo "Please enter some text!";
        exit;
    }

    $words = tokenize_text($text);
    $words = remove_stop_words($words);

    $wordFrequency = calculate_word_frequency($words);
    $wordFrequency = sort_word_frequency($wordFrequency, $sortOrder);
    $wordFrequency = array_slice($wordFrequency, 0, $limit);

    echo "<h1>Word Frequency Results</h1>";
    echo "<table border='1' style='width:50%; margin: 0 auto;'>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";
    
    foreach ($wordFrequency as $word => $frequency) {
        echo "<tr><td>" . htmlspecialchars($word) . "</td><td>" . $frequency . "</td></tr>";
    }
    echo "</table>";
}
?>