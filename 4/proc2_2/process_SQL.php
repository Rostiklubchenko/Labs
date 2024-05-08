<?php
include "../../config.php";

echo "Результати за " . $_POST['month'] . " місяць " . $_POST['year'] . " року.";
echo "<br><br>";
$query = "call lab4_2('$_POST[month]', '$_POST[year]')";
$result = mysqli_query($dbconnect, $query);
if(!$result) {
echo "<P> </P>";
exit(mysqli_error($dbconnect));
}
echo "<table border = 1>";
echo "<tr>

<td> kil </td>
<td> price </td>
</tr>";
while(list($kil, $price) = mysqli_fetch_row($result)) {
echo "<tr>
<td> $kil </td>
<td> $price </td>
</tr>";
}

?>