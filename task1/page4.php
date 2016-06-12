<?php
session_start();

$_SESSION['pages'][] = "page4";

echo "Это страница 4<br>\n";

for ($i=1; $i<=4; $i++){
    echo "<a href=\"page".$i.".php\"> Страница ".$i."</a><br>\n";
}

$pages = array_count_values($_SESSION['pages']);

ksort($pages);
foreach ($pages as $key => $value){
    echo "Вы посещали страницу $key $value раз.<br>\n";
}


if (isset($_POST["reset"]) && $_POST["reset"] == "reset"){
    session_destroy();
}
?>

<form method="POST">
    <input type="submit" name="reset" value="reset">
</form>
