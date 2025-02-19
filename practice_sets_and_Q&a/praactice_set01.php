<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle Area Calculator</title>
</head>
<body>

<h2>Triangle Area Calculator</h2>
<form method="POST">
    Side 1: <input type="number" name="side1" required step="any"><br><br>
    Side 2: <input type="number" name="side2" required step="any"><br><br>
    Side 3: <input type="number" name="side3" required step="any"><br><br>
    <input type="submit" name="calculate" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["side1"];
    $b = $_POST["side2"];
    $c = $_POST["side3"];

    if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
        $s = ($a + $b + $c) / 2;

        $areaSquared = $s * ($s - $a) * ($s - $b) * ($s - $c);
        $sqrt = 0;
        $num = 1;

        while ($num * $num <= $areaSquared) {
            $sqrt = $num;
            $num += 1;
        }

        $precision = 0.01;
        while ($sqrt * $sqrt < $areaSquared) {
            $sqrt += $precision;
        }

        echo "<h3>Triangle Area: " . number_format($sqrt, 2) . " square units</h3>";
    } else {
        echo "<h3 style='color:red;'>Invalid Triangle Sides</h3>";
    }
}
?>

</body>
</html>
