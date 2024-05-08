<?php
include "../../config.php";
echo "Результат виконання <br>";

$date1 = $_POST['date1'];
$date2 = $_POST['date2'];

$query = "call lab3_1('$date1', '$date2')";
$result = mysqli_query($dbconnect, $query);
if(!$result) {
echo "<P></P>";
exit(mysqli_error($dbconnect));
}
echo "<br><table border = 1>";
echo "<tr>
 
<td> <b>N_TT</b> </td>
<td> <b>N_FIRM</b> </td>
<td> <b>VARTIST</b> </td>
<td> <b>DATE_R</b> </td>
<td> <b>DATE_S</b> </td>
</tr>";

while(list($namett, $namefirm, $vartist, $date_r,  $date_s) = mysqli_fetch_row($result)) {
echo "<tr>
<td> $namett </td>
<td> $namefirm </td>
<td> $vartist </td>
<td> $date_r </td>
<td> NULL </td>
</tr>";
}

?>