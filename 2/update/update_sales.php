<?php
include "../../config.php";

$id = $_GET['id'];
$k_pp = $_GET['code_price'];
$kil = $_GET['count'];
$d_real = $_GET['date_r'];
$d_spl = $_GET['date_s'];

$query = "UPDATE `sales` SET `K_PP` = '$k_pp', `KIL` = '$kil', `D_REAL` = '$d_real', `D_SPL` = '$d_spl' WHERE `sales`.`ID` = $id";

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

if ($ver) echo 'Values changed 
<form action="../index.html" style="margin: 0px;">
    <input type="submit" style = "margin-top: 10px; width=80px;" value="Main page">
</form>';
?>

<button onclick="history.back(-1)" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>