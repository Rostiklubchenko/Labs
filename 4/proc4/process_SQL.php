<?php
include "../../config.php";
echo "Результат виконання <br>";

$date1 = $_POST['date1'];
$date2 = $_POST['date2'];

$query = "call lab5_2('$date1', '$date2')";
$result = mysqli_query($dbconnect, $query);
if(!$result) {
echo "<P></P>";
exit(mysqli_error($dbconnect));
}
echo "<br><table border = 1>";
echo "<tr>
 
<td> <b>FULL_NAME</b> </td>
<td> <b>C_YO</b> </td>
</tr>";

while(list($FULL_NAME, $C_YO) = mysqli_fetch_row($result)) {
echo "<tr>
<td> $FULL_NAME </td>
<td> $C_YO </td>
</tr>";
}

?>