<?php
echo "Current Date & Time: " . date("d-m-Y H:i:s") . "<br><br>";
$dob = "2026-02-06"; 

$today = new DateTime();
$nextBirthday = new DateTime(date("Y") . "-" . date("m-d", strtotime($dob)));
if ($nextBirthday < $today) {
    $nextBirthday->modify("+1 year");
}

$interval = $today->diff($nextBirthday);
echo "Days left until next birthday: " . $interval->days;
?>

