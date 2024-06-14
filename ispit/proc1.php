<?php
include "../config.php";

$query = "CALL `pr1`();";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'firms' </P>");
}

// Номер замовлення	Найменування товару	Назва фірми	Кількість	Ціна	Вартість

echo "Результат виконанння<br><br><table border=2>";
echo"<tr>
  <th>Номер замовлення</th>
  <th>Найменування товару</th>
  <th>Назва фірми</th>
  <th>Кількість</th>
  <th>Ціна</th>
  <th>Вартість</th>
</tr>";
while(($ord=mysqli_fetch_assoc($ver)))
{
    echo "<tr>
    <td>".$ord['Номер замовлення']."</td>
    <td>".$ord['Найменування товару']."</td>
    <td>".$ord['Назва фірми']."</td>
    <td>".$ord['Кількість']."</td>
    <td>".$ord['Ціна']."</td>
    <td>".$ord['Вартість']."</td>
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