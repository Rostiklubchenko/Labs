<?php
include "../../config.php";
echo "Результат виконання <br>";
$query = "call lab3_3($_POST[interval])";
$result = mysqli_query($dbconnect, $query);
if(!$result) {
echo "<P></P>";
exit(mysqli_error($dbconnect));
}
echo "<table border = 1>";
echo "<tr>

<td> <b>fullinfo</b> </td>
<td> <b>kil</b> </td>
<td> <b>date_r</b> </td>
<td> <b>date_s</b> </td>
</tr>";
while(list($fullinfo, $kil, $date_r, $date_s) =
mysqli_fetch_row($result)) {
echo "<tr>
<td> $fullinfo </td>
<td> $kil </td>
<td> $date_r </td>
<td> $date_s </td>
</tr>";
}
?>