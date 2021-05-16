<?php
    session_start();
    $birthday = new \Datetime($_SESSION['birthday']);
    $today = new \Datetime('today');
    $birthday->setDate($today->format('Y'), $birthday->format('m'), $birthday->format('d'));
    $diff = $today->diff($birthday);
    if ($diff->invert) {
        $birthday->modify('+1 year');
        $diff = $today->diff($birthday);
    }
    $days = $diff->days;
    if ($days == 0) echo "Happy Birthday!";
    else echo "$days days left until the birthday .";
    session_destroy();
?>