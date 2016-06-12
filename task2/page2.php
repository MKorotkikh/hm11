<?php

session_start();

if (isset($_SESSION['name'])) {
    echo "Привет " . $_SESSION['name'] . "!<br>\n";
}

?>

<a href="page1.php">Страница 1</a>
