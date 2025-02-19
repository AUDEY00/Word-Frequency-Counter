<!DOCTYPE html>
<html>
<head>
    <title>Even Numbers from Matrix</title>
</head>
<body>

<h2>Even Numbers from the Matrix</h2>
<ul>
    <?php
    $matrix = [
        [12, 23, 34],
        [45, 55, 62],
        [71, 84, 90]
    ];

    $numbers = [];
    foreach ($matrix as $row) {
        foreach ($row as $num) {
            $numbers[] = $num;
        }
    }

    $i = 0;
    while ($i < count($numbers)) {
        if ($numbers[$i] % 2 == 0) {
            echo "<li>" . $numbers[$i] . "</li>";
        }
        $i++;
    }
    ?>
</ul>

</body>
</html>
