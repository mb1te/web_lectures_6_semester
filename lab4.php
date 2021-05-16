<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lab 4</title>
</head>
<body style="text-align:center;">
    <form action="lab4.php" method="POST">
        <h3>Добавить товар</h3><br>
        <label for="name">Название:   </label> <input type="text" id="name" name="name" required><br><br>
        <label for="price">Цена:      </label> <input type="number" id="price" name="price" required><br><br>
        <label for="count">Количество:</label> <input type="number" id="count" name="count" required><br><br>
        <button type="submit" name="add">Отправить</button>
    </form>
    <?php
        if (isset($_POST['add'])) {
            $file = file_get_contents('lab4_data.json');
            $products_list = json_decode($file, TRUE);
            $name = $_POST['name'];
            $price = $_POST['price'];
            $count = $_POST['count'];
            $products_list[$name] = array(
                'price' => $price,
                'count' => $count
            );
            file_put_contents('lab4_data.json', json_encode($products_list));
        }
    ?>
    <a href="lab4_edit.php">Найти товар и исправить</a>
</body>
</html>