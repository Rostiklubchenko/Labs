<?php
  $query="select count(*) from users where USER_NAME='$_SESSION[name]'";
  $urs=mysqli_query($dbconnect,$query);
  if(!$urs) exit("Помилка - ".mysqli_error($dbconnect));
  $rez_total=mysqli_fetch_row($urs);
  $total=$rez_total[0];
  if($total>0) exit("Користувач з ім'ям <b>".$_SESSION['name']."</b> вже зареєстрований");

  $query="select count(*) from users where USER_EMAIL='$_SESSION[email]'";
  $urs=mysqli_query($dbconnect,$query);
  if(!$urs) exit("Помилка - ".mysqli_error($dbconnect));
  $rez_total=mysqli_fetch_row($urs);
  $total=$rez_total[0];
  if($total>0) exit("Користувач з поштою <b>".$_SESSION['email']."</b> вже зареєстрований");

  $query="select count(*) from users where USER_PHONE='$_SESSION[tel]'";
  $urs=mysqli_query($dbconnect,$query);
  if(!$urs) exit("Помилка - ".mysqli_error($dbconnect));
  $rez_total=mysqli_fetch_row($urs);
  $total=$rez_total[0];
  if($total>0) exit("Користувач з телефоном <b>".$_SESSION['tel']."</b> вже зареєстрований");

  $str='0-Te=d7Z';
  $str_hach=password_hash($_SESSION['pass'],PASSWORD_DEFAULT);
  $str_md5=MD5($_SESSION['pass']);
  $str_md5_salt=MD5($_SESSION['pass'].$str);

  $query2="insert into users (USER_ID, USER_NAME, USER_PASSWORD, USER_HASH, USER_MD5, USER_MD5_SALT, USER_EMAIL, USER_URL, USER_PHONE) values (null, '$_SESSION[name]', '$_SESSION[pass]', '$str_hach', '$str_md5', '$str_md5_salt', '$_SESSION[email]', '$_SESSION[url]', '$_SESSION[tel]')";
  $query3="CREATE USER '".$_SESSION['name']."' IDENTIFIED BY '".$_SESSION['pass']."'";
  if(mysqli_query($dbconnect,$query3))
  {
    echo "<P>Реєстрація пройшла успішно</P>";
  }
  else
  {
    echo "<P>Виник збій при реєстрації #1</P>";
    echo mysqli_error($dbconnect);
  }

  if(mysqli_query($dbconnect,$query2))
  {

  $query4="GRANT ALL ON *.* TO '".$_SESSION['name']."'";
    if(!mysqli_query($dbconnect,$query4))
    {
      echo "<P>Привілеї не встановлено</P>";
      exit("Помилка - ".mysqli_error($dbconnect));
    }
    echo"
      <table>
      <form action='end.php' method='post'>
      <p><input type='submit' value='Увійти до системи'></p>
      </form>
      </table>
      ";
  }
  else
  {
    echo "<P>Виник збій при реєстрації #2</P>";
  }

  if(!mysqli_close($dbconnect))
  {
    echo "Зв'язок з хостом ".$dblocation." не розірвано";
    exit("Помилка - ".mysqli_error($dbconnect));
  } 
  else
  {
    echo "Зв'язок з хостом ".$dblocation." розірвано";
  }
?>
