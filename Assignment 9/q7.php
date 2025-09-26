<?php

class NumberException extends Exception {}

function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new NumberException("No numbers provided");
    }
    return array_sum($numbers) / count($numbers);
}
$testCases = [
    "Case 1: Normal numbers" => [10, 20, 30, 40, 50],
    "Case 2: Empty array"    => []
];

foreach ($testCases as $label => $nums) {
    echo "<h3>$label</h3>";
    try {
        $avg = calculateAverage($nums);
        echo "Average = " . $avg . "<br>";
    } catch (NumberException $e) {
        echo " Error: " . $e->getMessage() . "<br>";
    }
    echo "<hr>";
}
?>

