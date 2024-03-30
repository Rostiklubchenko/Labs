<?php
include "../../config.php";

$kod = $_GET['code'];

$query = "select * from products where K_TT = '$kod'";

try 
{
    $ver=mysqli_query($dbconnect,$query);
    $rez=mysqli_fetch_array($ver,MYSQLI_BOTH);
}
catch (Exception $e) 
{
    echo "<P>Error</P>";
    echo $e -> getMessage();
    echo "<br>";
    echo '<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>';
    exit();
}

if ($rez==null){
    echo "Error. This ID wasn't found.<br>";
    echo '<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>';
    exit();
}

?>

<html>
<form action="update_product.php" style = "margin: 0px;">
    Code product:<br>
    <input type="text" name="code_p" value="<?php echo $rez[0];?>" readonly><br>
    Name product:<br>
    <input type="text" name="name_p" value="<?php echo $rez[1];?>"><br>
    <input type="submit" value="Change" style = "margin: 10px; width:80px; margin-left: 0px; margin-bottom: 0px;">
</form>

<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>
</html>