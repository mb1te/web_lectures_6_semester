<?php
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "lab8";
    $link = new mysqli($host, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        echo "Error while connection";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 8</title>
    <link rel="stylesheet" href="css/bootstrap.css">   
</head>
<body style="text-align:center;">
    <br>
    <h3>Поиск по названию зоопарка:</h3>
    <form action="lab8.php" method="POST" class="form-check-input">
        <input type="text" name="zoo" id="zoo" required placeholder="Зоопарк"><br><br>
        <button type="submit" name="field1" class="btn btn-primary">Отправить</button>
    </form>
    <?php
        if (isset($_POST['field1'])) {
            if ($result = $link->prepare("SELECT * FROM zoos WHERE name = ?")) {
                $result->bind_param("s", $_POST['zoo']);
                $result->execute();
                $result->bind_result($col1, $col2, $col3, $col4);
                while ($result->fetch()) {
                    echo "Название: " . $col1 . "; Адрес: ". $col2 . "; Тип: " . $col3 . "; Телефон: " . $col4 . "<br>";
                }
            }
        }
    ?>
    <br>
    <h3>Поиск по кличке:</h3>
    <form action="lab8.php" method="POST">
        <input type="text" name="alias" id="alias" required placeholder="Кличка"><br><br>
        <button type="submit" name="field2">Отправить</button>
    </form>
    <?php
        if (isset($_POST['field2'])) {
            if ($result = $link->prepare("SELECT * FROM animals WHERE alias = ?")) {
                $result->bind_param("s", $_POST['alias']);
                $result->execute();
                $result->bind_result($col1, $col2, $col3, $col4);
                while ($result->fetch()) {
                    echo "Кличка: " . $col1 . "; Тип: ". $col2 . "; Зоопарк: " . $col3 . "; Вес: " . $col4 . "<br>";
                }
            }
        }
    ?>
    <br>
    <h3>Добавить животное:</h3>
    <form action="lab8.php" method="POST">
        <input type="text" name="alias" required placeholder="Кличка"><br><br>
        <input type="text" name="type" required placeholder="Тип"><br><br>
        <select name="zoo" required placeholder="Зоопарк">
            <?php
                $result = $link->prepare("SELECT name FROM zoos");
                $result->execute();
                $result->bind_result($zoo);
                while ($result->fetch()) {
                    echo "<option value='$zoo'>$zoo</option>\n";
                }
            ?>
        </select><br><br>
        <input type="number" name="weight" required placeholder="Вес"><br><br>
        <button type="submit" name="add1">Отправить</button>
    </form>
    <?php
        if (isset($_POST['add1'])) {
            if ($result = $link->prepare("INSERT INTO animals VALUES(?,?,?,?)")) {
                $result->bind_param("sssi", $_POST['alias'], $_POST['type'], $_POST['zoo'], $_POST['weight']);
                $result->execute();
                if ($link->error) echo "Validation error!";
                else echo "Success!";
            }
            else {
                echo "Error!";
            }
        }
    ?>
    <br><br><br>
    <h3>Добавить зоопарк:</h3>
    <form action="lab8.php" method="POST">
        <input type="text" name="name" required placeholder="Название"><br><br>
        <input type="text" name="adress" required placeholder="Адрес"><br><br>
        <input type="text" name="type" required placeholder="Тип"><br><br>
        <input type="tel" name="tel" required placeholder="Телефон"><br><br>
        <button type="submit" name="add2">Отправить</button>
    </form><br><br>
    <?php
        if (isset($_POST['add2'])) {
            if ($result = $link->prepare("INSERT INTO zoos VALUES(?,?,?,?)")) {
                $result->bind_param("sssi", $_POST['name'], $_POST['adress'], $_POST['type'], $_POST['tel']);
                $result->execute();
                if ($link->error) echo "Validation error!";
                else echo "Success!";
            }
            else {
                echo "Error!";
            }
        }
    ?>
</body>
</html>
<?php
    $link->close();
?>