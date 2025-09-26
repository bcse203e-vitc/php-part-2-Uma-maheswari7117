<?php
$inputFile = __DIR__ . "/students.txt";
$errorFile = __DIR__ . "/errors.log";
file_put_contents($errorFile, "");

if (!file_exists($inputFile)) {
    die(" Error: students.txt not found in this folder.");
}

$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
echo "<h3>Valid Student Records</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";
$errors = [];

foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) < 3 || empty($parts[0]) || empty($parts[1]) || empty($parts[2])) {
        $errorMsg = "$line – Missing fields";
        $errors[] = $errorMsg;
        file_put_contents($errorFile, $errorMsg . "\n", FILE_APPEND);
        continue;
    }

    list($name, $email, $dob) = $parts;

    if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
        $errorMsg = "$line – Invalid email";
        $errors[] = $errorMsg;
        file_put_contents($errorFile, $errorMsg . "\n", FILE_APPEND);
        continue;
    }

    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    echo "<tr><td>$name</td><td>$email</td><td>$age</td></tr>";
}

echo "</table>";

if (!empty($errors)) {
    echo "<h3>Invalid Records / Errors</h3>";
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li>$err</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No errors found.</p>";
}

echo "<p>Check errors.log file for invalid records as well.</p>";
?>

