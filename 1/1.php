<?php
include "../config.php";

// --- 1 --- 
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

// --- 2 --- 
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

// --- 3 ---
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

// --- 4 ---
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