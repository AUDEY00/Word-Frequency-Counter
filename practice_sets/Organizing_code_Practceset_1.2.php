<?php
/**
*this script computes the total cost of items in a shopping cart, 
*processes string manipulations, and determines whether a number is even or odd.
 */

/**
 * calculate the total price of itemss.
 *
 * @param array $items An array of items with their prices.
 * @return float The total price of all items.
 */
function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}
/**
 * remove spaces from a string and convert it to lowercase.
 *
 * @param string $input The input string.
 * @return string The modified string.
 */
function formatString(string $input): string {
    $formattedString = str_replace(' ', '', $input);
    return strtolower($formattedString);
}
/**
 * check if a number is even or odd.
 *
 * @param int $number The number to check.
 * @return string The result message.
 */
function checkEvenOdd(int $number): string {
    return ($number % 2 === 0) ? "The number $number is even." : "The number $number is odd.";
}
// to Defiine first the items we nnned
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
// we need to display prices after we calculate it
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice . PHP_EOL;
// to show the string maanipulation or to perform it
$originalString = "This is a poorly written program with little structure and readability.";
$modifiedString = formatString($originalString);
echo "Modified string: " . $modifiedString . PHP_EOL;
// check if a number is even or odd
$numberToCheck = 42;
echo checkEvenOdd($numberToCheck) . PHP_EOL; //php_eol is predefine contaants for handling line breaaks like /n or /r
?>
