<?php
include "../../config.php";

$kod = $_GET['code_p'];
$name = $_GET['name_p'];

$query = "UPDATE `products` SET `N_TT` = '$name' WHERE `products`.`K_TT` = $kod";

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