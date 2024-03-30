<?php
include "../../config.php";
$query = "select * from firms";
$ver = mysqli_query($dbconnect, $query);
$var1 = $_GET['code_p'];
$var2 = $_GET['name_p'];

if(!is_numeric($var1))
{
    echo "Enter number in code";
    exit();
}

$query = "insert into products values ('$var1', '$var2')";

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