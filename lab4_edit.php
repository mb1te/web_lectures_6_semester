<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lab 4</title>
</head>
<body style="text-align:center;">
    <form action="lab4_edit.php" method="POST">
        <h3>Поиск</h3>
        <label for="val">Название: </label><input type="text" id="val" name="val"><br><br>
        <button type="submit" name="find">Найти</button>
    </form>
    <form action="lab4_edit.php" method="POST">
        <h3>Редактировать поле</h3>
        <label for="val">Название: </label><input type="text" id="val" name="val"><br><br>
        <label for="price">Цена:      </label> <input type="number" id="price" name="price" required><br><br>
        <label for="count">Количество:</label> <input type="number" id="count" name="count" required><br><br>
        <button type="submit" name="edit">Исправить</button>
    </form>
    <?php
        $file = file_get_contents('lab4_data.json');
        $products_list = json_decode($file, TRUE);
        if (isset($_POST['find'])) {
            if (array_key_exists($_POST['val'], $products_list)) {
                    $name = $_POST['val'];
                    $price = $products_list[$name]['price'];
                    $count = $products_list[$name]['count'];
                    echo "<b>Найдено поле: Название = $name, Цена = $price, Количество = $count </b><br>";
            }
            else echo "<b> Поле не найдено</b>\n";
        }
        if (isset($_POST['edit'])) {
            if (array_key_exists($_POST['val'], $products_list)) {
                $name = $_POST['val'];
                $price = $products_list[$name]['price'];
                $count = $products_list[$name]['count'];
                echo "<b>Было: Название = $name, Цена = $price, Количество = $count </b><br>";
                $price = $_POST['price'];
                $count = $_POST['count'];
                $products_list[$name]['price'] = $price;
                $products_list[$name]['count'] = $count;
                echo "<b>Исправлено: Название = $name, Цена = $price, Количество = $count </b><br>";
                file_put_contents('lab4_data.json', json_encode($products_list));
            }
            else echo "<b>Не отправлено название продукта\n</b>";
        }
    ?>
</body>
</html>