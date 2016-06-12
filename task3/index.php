<?php
if (isset($_POST['reset']) && $_POST['reset'] == "TRUE"){
    setcookie('user');
}

$sym="абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯqwertyuiopasdfghjklzxcvbnm.-_QWERTYUIOPASDFGHJKLZXCVBNM0123456789";
if (isset($_POST['login']) &&
    !empty($_POST['login']) &&
    strlen($_POST['login']) == strspn($_POST['login'], $sym)) {
    $check_login = 1;
}

if (isset($_POST['eMail']) && !empty($_POST['eMail'])) {

    $eMail = trim($_POST['eMail']);                        //Удаление лишних символов
    if (strlen($eMail) <= 8) {                             //Проверка на количество символов
        echo "Ваш eMail должен быть больше 8 символов <br>\n";
        $eMail1 = 0;
    } else {
        $eMail1 = 1;
    }

    if (strpos($eMail, "@") != strrpos($eMail, "@") || strpos($eMail, "@") == FALSE) { //Проверка на наличие только одной собачки
        echo "В Вашем eMail должен быть только один символ @ <br>\n";
        $eMail2 = 0;
    } else {
        $eMail2 = 1;
    }

    if (strpos(substr($eMail, strpos($eMail, "@")), ".") < 3) { //Проверка на наличие точки и наличия двух букв после собачки
        echo "Вы ввели некоректное название почтового сервиса <br>\n";
        $eMail3 = 0;
    } else {
        $eMail3 = 1;
    }

    $domain = substr($eMail, 1 + strrpos($eMail, "."));
    if ($domain == "ru" || $domain == "com" || $domain == "net" || $domain == "by") { //Проверка домена
        $eMail4 = 1;
    } else {
        echo "Вы ввели некоректный домен <br>\n";
        $eMail4 = 0;
    }

    if (strpos($eMail, "_") != strrpos($eMail, "_")) {            //Проверка ограничения использования нижнего подчёркивания
        echo "В Вашем eMail должен быть только один символ нижнего подчёркивания <br>\n";
        $eMail5 = 0;
    } else {
        $eMail5 = 1;
    }

    $eName = substr($eMail, 0, strpos($eMail, "@"));                              //Отделяем имя акаунта
    $symbol = 'qwertyuiopasdfghjklzxcvbnm._QWERTYUIOPASDFGHJKLZXCVBNM0123456789';

    if (strlen($eName) != strspn($eName, $symbol)) {        //Проверка на наличие только разрешённых символов
        echo "Вы ввели некоректное имя аккаунта <br>\n";
        $eMail6 = 0;
    } else {
        $eMail6 = 1;
    }

    $check_eMail = $eMail1 * $eMail2 * $eMail3 * $eMail4 * $eMail5 * $eMail6;  //проверка выполнения всех требований
}

if (isset($_POST['password']) &&
    !empty($_POST['password']) &&
    strlen($_POST['password']) == strspn($_POST['password'], $sym)) {
    $check_password = 1;
}

if (isset($check_eMail) && isset($check_login) && isset($check_password)) {
    setcookie('user', "TRUE");
}

?>

<form method="post">
    <input type="text" name="login"><br>
    <input type="text" name="eMail"><br>
    <input type="password" name="password"><br>
    <input type="submit"><br>
    <?php echo (isset($_COOKIE['user']) && $_COOKIE['user'] == "TRUE"? "<input type=\"submit\" name=\"reset\" value=\"reset\">": "" )?>
</form>
