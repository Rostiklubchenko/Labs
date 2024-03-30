<?php
$dblocation = "127.0.0.1";
$dbuser = "root";
$dbpassword = "";

$dbconnect = mysqli_connect($dblocation, $dbuser, $dbpassword);
// if (!$dbconnect)
// {
//     exit("<P> No server </P>");
// } else { 
//     echo("<P> Connected </P>");
// }

$dbbase = "db1";

$select = mysqli_select_db($dbconnect, $dbbase);

// if (!mysqli_select_db($dbconnect, $dbbase))
// {
//     exit("<P> No database </P>");
// } else {
//     echo("<P> Data connected </P>");
// }
?>