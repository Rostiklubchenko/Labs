<?php
include "../../config.php";

$query = "select * from firms";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'firms' </P>");
}

echo "<table border=2><caption><h3>Таблиця 'firms'</h3></caption>";
echo"<tr>
  <th>K_FIRM</th>
  <th>N_FIRM</th>
</tr>";
while(($ord=mysqli_fetch_assoc($ver)))
{
  echo "<tr>
          <td> ".$ord['K_FIRM']." </td>
          <td> ".$ord['N_FIRM']." </td>
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