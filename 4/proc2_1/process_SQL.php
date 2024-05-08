<?php
include "../../config.php";

$name = $_POST['name'];

if(empty($_POST['name']))
echo "Результат для всіх фірм";
else{
echo "Результат для фірми '" . $_POST['name'] . "'";
}
echo "<br><br>";
$query = "call lab4_1('$name')";
$result = mysqli_query($dbconnect, $query);
if(!$result) {
echo "<P>Помилка.</P>";
exit(mysqli_error($dbconnect));
}
echo "<table border = 1>";
echo "<tr>

<td> <b>name</b> </td>
<td> <b>kil</b> </td>
<td> <b>vartist</b> </td>
</tr>";
while(list($name, $kil, $vartist) = mysqli_fetch_row($result)) {
echo "<tr>
<td> $name </td>
<td> $kil </td>
<td> $vartist </td>
</tr>";
}
echo "</table>";
?>