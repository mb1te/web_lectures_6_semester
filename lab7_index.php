<?php
    session_start();                                               
    if (isset($_GET['add'])) {
        $_SESSION['birthday'] = $_GET['birthday'];
        header("Location: lab7_test.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 7</title>
</head>
<body>
    <form action="lab7_index.php" method="GET">
        <label for="birthday">Дата рождения:</label><input type="date" id="birthday" name="birthday" required><br><br>
        <button type="submit" name="add">Отправить</button>
    </form>

</body>
</html>