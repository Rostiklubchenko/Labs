<?php
include "../../config.php";

$kod = $_GET['code_f'];
$name = $_GET['name_f'];

$query = "UPDATE `firms` SET `N_FIRM` = '$name' WHERE `firms`.`K_FIRM` = $kod";

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