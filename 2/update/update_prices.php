<?php
include "../../config.php";

$k_pp = $_GET['code_price'];
$k_firm = $_GET['code_firm'];
$k_tt = $_GET['code_product'];
$c_yo = $_GET['price'];

$query = "UPDATE `prices` SET `K_FIRM` = '$k_firm', `K_TT` = '$k_tt', `C_YO` = '$c_yo' WHERE `prices`.`K_PP` = $k_pp";

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