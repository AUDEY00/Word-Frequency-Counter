<?php
function cleanText($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    return $text;
}

function getWordFrequency($text) {
    $words = explode(" ", cleanText($text));
    $wordCounts = array_count_values($words);
    arsort($wordCounts);
    return $wordCounts;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"] ?? "";
    $sortOrder = $_POST["sort"] ?? "desc";
    $limit = $_POST["limit"] ?? 10;
    
    $wordFrequency = getWordFrequency($text);
    if ($sortOrder == "asc") {
        asort($wordFrequency);
    }
    $wordFrequency = array_slice($wordFrequency, 0, $limit, true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="process.php" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>
    <?php if (!empty($wordFrequency)): ?>
        <h2>Word Frequency Result</h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Word</th>
                <th>Count</th>
            </tr>
            <?php foreach ($wordFrequency as $word => $count): ?>
                <tr>
                    <td><?php echo htmlspecialchars($word); ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
