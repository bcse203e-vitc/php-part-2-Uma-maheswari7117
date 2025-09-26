<?php
$logFile = __DIR__ . "/access.log";

$username = "admin";
$action = "Logged In";
$timestamp = date("Y-m-d H:i:s");

$entry = "$username – $timestamp – $action\n";
if (file_put_contents($logFile, $entry, FILE_APPEND) === false) {
    die(" Error: Could not write to log file.");
}

if (file_exists($logFile)) {
    $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lastLogs = array_slice($logs, -5);

    echo "<h3>Last 5 Log Entries</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Log Entry</th></tr>";
    foreach ($lastLogs as $log) {
        echo "<tr><td>" . htmlspecialchars($log) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No logs available yet.";
}
?>

