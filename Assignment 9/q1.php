<?php
$students = [
    "Rahul" => 85,
    "Priya" => 92,
    "Arun"  => 78,
    "Neha"  => 95,
    "Karan" => 88
];

arsort($students);

$top_students = array_slice($students, 0, 3, true);

echo "<h3>Top 3 Students</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Name</th><th>Marks</th></tr>";
foreach ($top_students as $name => $marks) {
    echo "<tr><td>$name</td><td>$marks</td></tr>";
}
echo "</table>";
?>

