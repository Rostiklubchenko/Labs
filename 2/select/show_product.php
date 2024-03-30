<?php
include "../../config.php";
$query = "select * from products";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'products' </P>");
}

echo "<table border=2><caption><h3>Таблиця 'product'</h3></caption>";
echo"<tr>
  <th>K_TT</th>
  <th>N_TT</th>
</tr>";
while($rez=mysqli_fetch_array($ver,MYSQLI_BOTH))
{
  echo "<tr>
          <td> $rez[0] </td>
          <td> $rez[1] </td>
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