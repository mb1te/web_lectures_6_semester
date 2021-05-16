<?php
    echo "<!DOCTYPE html>\n<html>\n";
    echo "<head>\n";
    echo "<title> Lab 1</title>\n";
    echo "</head>";
    echo "<table style=\"border-collapse: collapse; text-align: center; margin-left: 30%; margin-top: 10%; background-color: lightgray\">\n<tr>\n";
    for ($i = 1; $i <= 5; $i++) {
        echo "<td style=\"border:1px solid black; padding: 10px;\">";
        for ($j = 1; $j <= 10; $j++) {
            echo "$i  *  $j = " . $i * $j . "<br/>\n";
        }
        echo "</td>\n";
    }
    echo "</tr>";
    echo "<tr>\n";
    for ($i = 6; $i <= 10; $i++) {
        echo "<td style=\"border:1px solid black; padding: 10px;\">";
        for ($j = 1; $j <= 10; $j++) {
            echo "$i  *  $j = " . $i * $j . "<br/>";
        }
        echo "</td>\n";
    }
    echo "</tr>\n";
    echo "</table>\n";
    echo "</html>";
?>