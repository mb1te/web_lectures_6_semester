<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab3</title>
</head>
<body>
    <?php
        if (isset($_GET['done'])) {
            $ab_x = $_GET['bx'] - $_GET['ax'];
            $ab_y = $_GET['by'] - $_GET['ay'];
            $bc_x = $_GET['cx'] - $_GET['bx'];
            $bc_y = $_GET['cy'] - $_GET['by'];
            $cd_x = $_GET['dx'] - $_GET['cx'];
            $cd_y = $_GET['dy'] - $_GET['cy'];
            $da_x = $_GET['ax'] - $_GET['dx'];
            $da_y = $_GET['ay'] - $_GET['dy'];
            $area1 = abs($ab_x * $bc_y - $ab_y * $bc_x) / 2;
            $area2 = abs($cd_x * $da_y - $cd_y * $da_x) / 2;
            echo 'Площадь четырехугольника равна ' . ($area1 + $area2);
        }
    ?>
    <br>
    <button onclick="document.location='lab3_form.php'">Вернуться</button>
</body>
</html>