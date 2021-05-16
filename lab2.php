<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 2</title>
    <style>
        td {
            border: 1px solid black;
            padding: 5px;
        }
        table {
            border-collapse: collapse;
            margin-left: 40%;
            margin-top: 5%;
        }
    </style>
</head>
<body>
    <?php 
        $food["Apple"] = 30;
        $food["Banana"] = 130;
        $food["Cherry"] = 30;
        $food["Coconut"] = 130;
        $food["Kiwi"]= 230;
        $food["Pineapple"] = 90;
        $food["Lime"] = 90;
        $food["Lemon"] = 50;
        $food["Mango"] = 130;
        $food["Olive"] = 90;
        $food["Peach"] = 50;
        $food["Avocado"] = 230;
        $food["Cucumber"] = 30;
        $food["Carrot"] = 10;
        $food["Tomato"] = 10;
        $food["Cabbage"] = 20;
        $food["Potatoes"] = 40;
        $food["Pepper"] = 50;
        $food["Turnip"] = 20;
        $food["Haricot"] = 10;

        $max_abs = 1e9;
        $name1 = "";
        $name2 = "";
        foreach ($food as $key1 => $val1) {
            foreach ($food as $key2 => $val2) {
                $cur_abs = abs($val1 - $val2);
                if ($cur_abs > 0 && $cur_abs < $max_abs) {
                    $max_abs = $cur_abs;
                    $name1 = $key1;
                    $name2 = $key2;
                }
            }
        }
    ?>
    <table>
        <tr>
            <td>Продукт</td>
            <td>Цена</td>        
        </tr>
        <?php
            foreach($food as $key => $val) {
                if ($key == $name1 || $key == $name2) {
                    echo "<tr style=\"background-color:green\">\n";
                    echo "<td> $key </td>\n";
                    echo "<td> $val </td>\n";
                    echo "</tr>\n";
                }
                else {
                    echo "<tr>\n";
                    echo "<td> $key </td>\n";
                    echo "<td> $val </td>\n";
                    echo "</tr>\n";
                }
            }
        ?>
    </table>
</body>
</html>