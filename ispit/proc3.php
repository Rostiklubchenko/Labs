<?php
include "../config.php";

$query = "CALL `pr3`();";
$ver=mysqli_query($dbconnect,$query);

if(!$ver) 
{
  exit("<P> Не вдалося встановити зв'язок з таблицею 'firms' </P>");
}

// Код продукту	Найменування продукту

echo "Результат виконанння<br><br><table border=2>";
echo"<tr>
  <th>Код продукту</th>
  <th>Найменування продукту</th>
</tr>";
while(($ord=mysqli_fetch_assoc($ver)))
{
    echo "<tr>
    <td>".$ord['Код продукту']."</td>
    <td>".$ord['Найменування продукту']."</td>
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