<?php
    include "../config.php";
    mysqli_close($dbconnect);

    $dbuser=$_POST['name'];
    $dbpassword=$_POST['pass'];

    try {
        $dbconnect=@mysqli_connect($dblocation,$dbuser,$dbpassword);
    }catch (Exception){
        exit('<P> Помилка входу.<br>Перевірте чи правильно введені ім\'я та пароль</P><button onclick="window.history.back();" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>');
    }

    echo "<P> Верифікація пройдена </P>";
    $query = "select * from users";
    $select = mysqli_select_db($dbconnect, "db1");
    $ver=mysqli_query($dbconnect,$query);
    while($rez=mysqli_fetch_array($ver,MYSQLI_BOTH))
    {
        if($_POST['name'] == $rez[1] && $_POST['pass'] == $rez[2])
        {
            echo "<P> Ім'я користувача - $rez[1].</P>";
            echo "<P> Email користувача - $rez[6]</P>";
            echo "<P> Телефон користувача - $rez[8]</P>";
            if( $rez[7] != null) echo "<P> URL користувача - $rez[7]</P>";
            echo '<form action="../1/1.php" method="post">
                    <button type="submit">LAB_1</button>
                  </form>';
            echo '<form action="../2/index.html" method="post">
                    <button type="submit">LAB_2</button>
                  </form>';            
        }
    }

?>
<button onclick="window.history.back();" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>