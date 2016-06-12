<?php
session_start();

$_SESSION['pages'][] = "page2";

echo "Это страница 2<br>\n";

for ($i=1; $i<=4; $i++){
    echo "<a href=\"page".$i.".php\"> Страница ".$i."</a><br>\n";
}
?>