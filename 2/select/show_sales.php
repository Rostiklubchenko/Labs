<?php
include "../../config.php";

$query = "select * from sales";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'sales' </P>");
}

echo "<table border=2><caption><h3>Таблиця 'sales' </h3></caption>";
echo"<tr>
  <th>ID</th>
  <th>K_PP</th>
  <th>KIL</th>
  <th>D_REAL</th>
  <th>D_SPL</th>
</tr>";
while($rez=mysqli_fetch_object($ver))
{
  echo "<tr>
          <td> $rez->ID </td>
          <td> $rez->K_PP </td>
          <td> $rez->KIL </td>
          <td> $rez->D_REAL </td>
          <td> $rez->D_SPL </td>
       </tr>";
}
echo "</table>";
?>

<button onclick="goBack()" style = "margin: 10px; width:80px; margin-left: 0px;">Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>