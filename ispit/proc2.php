<?php
include "../config.php";

$query = "CALL `pr2`();";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'firms' </P>");
}

echo "Результат виконанння<br><br><table border=2>";
echo"<tr>
  <th>Назва фірми</th>
  <th>Загальна кількість замовлень</th>
</tr>";
while(($ord=mysqli_fetch_assoc($ver)))
{
    echo "<tr>
    <td>".$ord['Назва фірми']."</td>
    <td>".$ord['Загальна кількість замовлень']."</td>
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