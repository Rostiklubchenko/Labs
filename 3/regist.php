<form method="post">
    <p><input type="text" name="name" placeholder="Ім'я"></p>
    <p><input type="password" name="pass" placeholder="Пароль"></p>
    <p><input type="password" name="pass_again" placeholder="Підтвердіть пароль"></p>
    <p><input type="text" name="email" placeholder="Email"></p>
    <p><input type="text" name="url" placeholder="URL"></p>
    <p><input type="text" name="tel" placeholder="Телефон"></p>
    <p><input type="submit" class="button" value="Реєстрація"></p>
    <p>Вже зареєстровані? <a href="index.html">Увійти</a>
</form>

<?php
    session_start();
    if(empty ($_POST)) exit();
    $_POST['name']=trim($_POST['name']);
    $_POST['pass']=trim($_POST['pass']);
    $_POST['pass_again']=trim($_POST['pass_again']);

    if(empty ($_POST['name'])) exit('Поле "Ім\'я" не заповнено');
    if(empty ($_POST['pass'])) exit('Одне з полів "Пароль" не заповнено');
    if(!preg_match("|^[-0-9a-z_]{8,20}$|i",$_POST['pass']))
        exit('Поле "Пароль" заповнено не правильно');
    if(empty ($_POST['pass_again'])) exit('Одне з полів "Пароль" не заповнено');
    if($_POST['pass']!=$_POST['pass_again']) exit('Пароль та підтвердження не співпадають');
    if(empty ($_POST['email'])) exit('Поле "Email" не заповнено');
    if(!empty ($_POST['email']))
    {
        if(!preg_match("|^[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}$|i",$_POST['email'])) 
            exit('Поле "e-mail" повинно відповідати формату name@ukr.net');
    }
    if(empty ($_POST['tel'])) exit('Поле "Телефон" не заповнено');
    if(!empty ($_POST['tel']))
    {
        if(!preg_match("|^[0-9]{10}$|",$_POST['tel']))
            exit('Поле "Телефон" заповнено не правильно');
    }

    include ("../config.php");

    $_POST['name']=mysqli_escape_string($dbconnect,$_POST['name']);
    $_POST['pass']=mysqli_escape_string($dbconnect,$_POST['pass']);
    $_POST['email']=mysqli_escape_string($dbconnect,$_POST['email']);
    $_POST['url']=mysqli_escape_string($dbconnect,$_POST['url']);

    $_SESSION['name']=$_POST['name'];
    $_SESSION['pass']=$_POST['pass'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['url']=$_POST['url'];
    $_SESSION['tel']=$_POST['tel'];

    include ("processing.php");
?>
