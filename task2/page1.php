<?php
session_start();

if (isset($_POST["name"]) && !empty($_POST['name'])){
    $_SESSION['name'] = $_POST["name"];
}

if (isset($_SESSION['name'])) {
    echo "Привет " . $_SESSION['name'] . "!<br>\n";
}

?>

<form method="post" action="page1.php">
    <input type="text" name="name">
    <input type="submit">
</form>

<a href="page2.php">Страница 2</a>