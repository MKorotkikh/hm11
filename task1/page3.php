<?php
session_start();

$_SESSION['pages'][] = "page3";

echo "Это страница 3<br>\n";

for ($i=1; $i<=4; $i++){
    echo "<a href=\"page".$i.".php\"> Страница ".$i."</a><br>\n";
}
?>