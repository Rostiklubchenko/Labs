<?php
include "../../config.php";

$query = "select * from prices";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'prices' </P>");
}

// echo "<P><B> Таблиця 'prices' </B></P>";
echo "<table border=2><caption><h3>Таблиця 'prices'</h3></caption>";
echo"<tr>
  <th>K_PP</th>
  <th>K_FIRM</th>
  <th>K_TT</th>
  <th>C_YO</th>
</tr>";
while(list($k_pp,$k_firm,$k_tt,$c_yo)=mysqli_fetch_row($ver))
{
  echo "<tr>
          <td> $k_pp </td>
          <td> $k_firm </td>
          <td> $k_tt </td>
          <td> $c_yo </td>
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