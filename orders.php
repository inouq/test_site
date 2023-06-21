<?php 
include 'landing.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Список заказов</title>
    <link rel="stylesheet" type="text/css" href="css/orders.css">
</head>
<body>
  <h1>Список заказов</h1>
  <table>
    <thead>
      <tr>
        <th>id Заказа</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчество</th>
        <th>E-mail</th>
        <th>Номер телефона</th>
        <th>Вид деятельности</th>
        <th>id Тарифа</th>
        <th>Наименование тарифа</th>
        <th>info_id</th>
        <th>Длительность</th>
        <th>Итого</th>
      </tr>
    </thead>
    <tbody name="table">
      <?php 
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr class='table_length'>";
            echo  ('<td>'. '<input class= table_length_id value = '. $row["id"] . '>'  . '</td>');  
            echo  ('<td>'. '<input class= table_length value = '. $row["first_name"] . '>' . '</td>');
            echo  ('<td>'. '<input class= table_length value = '. $row["last_name"] . '>' . '</td>');
            echo  ('<td>'. '<input class= table_length value = '. $row["middle_name"] . '>' . '</td>');
            echo  ('<td>'. '<input class= table_length value = '. $row["email"] . '>' . '</td>');
            echo  ('<td>'. '<input class= table_length value = '. $row["phone_number"] . '>' . '</td>');
            echo  ('<td>'. '<input class= table_length value = '. $row["activity"] . '>' . '</td>');
            echo  ('<td>'. '<input class= table_length_id value = '. $row["tariff_id"] . '>' . '</td>');
            echo ('<td>' . '</td>');
            echo  ('<td>'. '<input class= table_length_id value = '. $row["info_id"] . '>' . '</td>');
            echo ('<td>' . '</td>');
            echo  ('<td>'. '<input class= table_length_price value = '. $row["total_price"] . '>' . '</td>');
            echo "</tr>";
          } 
        }
      ?>
    </tbody>
  </table>
</body>
</html>