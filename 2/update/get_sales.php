<?php
include "../../config.php";

$kod = $_GET['code'];

$query = "select * from sales where ID = '$kod'";

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
<form action="update_sales.php" style = "margin: 0px;">
    ID<br>
    <input type="text" name="id" value="<?php echo $rez[0];?>" readonly><br>
    Code price<br>
    <input type="text" name="code_price" value="<?php echo $rez[1];?>" required><br>
    Quantity<br>
    <input type="text" name="count" value="<?php echo $rez[2];?>" required><br>
    Realization date<br>
    <input type="date" name="date_r" value="<?php echo $rez[3];?>"><br>
    Payment date<br>
    <input type="date" name="date_s" value="<?php echo $rez[4];?>"><br>
    <input type="submit" style = "margin: 10px; width:80px; margin-left: 0px; margin-bottom: 0px;" value="Change">
</form>

<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>

</html>