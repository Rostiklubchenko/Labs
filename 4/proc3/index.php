<?php
include "../../config.php";
$query = "call lab5_1()";
$result = mysqli_query($dbconnect, $query);
echo '<table border="1">
<tr>
  <th>Квартал і рік</th>
  <th>Праска TEFAL</th>
  <th>Кухоний комбайн TEFAL</th>
  <th>Міксер TEFAL</th>
  <th>Фен TEFAL</th>
  <th>Потельна TEFAL</th>
  <th>Пилосос TEFAL</th>
  <th>Праска ROWENTA</th>
  <th>Кухоний комбайн ROWENTA</th>
  <th>Міксер ROWENTA</th>
  <th>Фен ROWENTA</th>
  <th>Потельна ROWENTA</th>
  <th>Пилосос ROWENTA</th>
  <th>Праска BOSCH</th>
  <th>Кухоний комбайн BOSCH</th>
  <th>Міксер BOSCH</th>
  <th>Фен BOSCH</th>
  <th>Потельна BOSCH</th>
  <th>Пилосос BOSCH</th>
  <th>Праска MOULINEX</th>
  <th>Кухоний комбайн MOULINEX</th>
  <th>Міксер MOULINEX</th>
  <th>Фен MOULINEX</th>
  <th>Потельна MOULINEX</th>
  <th>Пилосос MOULINEX</th>
  <th>Праска PHILIPS</th>
  <th>Кухоний комбайн PHILIPS</th>
  <th>Міксер PHILIPS</th>
  <th>Фен PHILIPS</th>
  <th>Потельна PHILIPS</th>
  <th>Пилосос PHILIPS</th>
</tr>';
while ($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
?>