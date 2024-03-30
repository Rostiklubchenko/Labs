<?php
include "../../config.php";
$query = "select * from firms";
$ver = mysqli_query($dbconnect, $query);
$var1 = $_GET['code_price'];
$var2 = $_GET['code_firm'];
$var3 = $_GET['code_product'];
$var4 = $_GET['price'];

if(!is_numeric($var1))
{
    echo "Enter number in code price";
    exit();
} 
else if (!is_numeric($var2))
{
    echo "Enter number in code firm";
    exit();
}
else if (!is_numeric($var3))
{
    echo "Enter number in code product";
    exit();
}
else if (!is_numeric($var4))
{
    echo "Enter number in price";
    exit();
}

$query = "insert into prices values ('$var1', '$var2', '$var3', '$var4')";

$ver = false;

try 
{
    $ver = mysqli_query($dbconnect, $query);
} 
catch (Exception $e)
{
    echo "<P>Error</P>";
    echo $e -> getMessage();
    echo "<br>";
}
if ($ver) echo 'Values added 
<form action="../index.html" style="margin: 0px;">
    <input type="submit" style = "margin-top: 10px; width=80px;" value="Main page">
</form>';
?>

<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>