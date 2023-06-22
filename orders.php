<?php 
include 'landing.php';
include 'update.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Список заказов</title>
    <link rel="stylesheet" type="text/css" href="css/orders.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
  <h2>Список заказов</h2>
  <a class="switch" href = 'index.php'>На главную</a>
    <div class="table_content">
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
            <th>id Длительность</th>
            <th>Длительность</th>
            <th>Итого</th>
            <th></th>
          </tr>
        </thead>
        <tbody name="table">
          <?php 
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr class='table_length'>";
                echo "<form action='orders.php' method='post'>";
                echo  ('<td>'. '<input name = "orders_id" id = edit_field class= table_length_id readonly value = '. $row["id"] . '>'  . '</td>');  
                echo  ('<td>'. '<input name = "first-name" id = edit_field class= table_length value = '. $row["first_name"] . '>' . '</td>');
                echo  ('<td>'. '<input name = "last-name" id = edit_field class= table_length value = '. $row["last_name"] . '>' . '</td>');
                echo  ('<td>'. '<input name = "middle-name" id = edit_field class= table_length value = '. $row["middle_name"] . '>' . '</td>');
                echo  ('<td>'. '<input name = "email" id = edit_field class= table_length value = '. $row["email"] . '>' . '</td>');
                echo  ('<td>'. '<input name = "phone_number" id = edit_field class= table_length value = '. $row["phone_number"] . '>' . '</td>');
                echo  ('<td>'. '<input name = "activity" id = edit_field class= table_length value = '. $row["activity"] . '>' . '</td>');
                echo  ('<td>'. '<input name = "tariff_id" id = edit_field class= table_length_id value = '. $row["tariff_id"] . '>' . '</td>');
                echo ('<td>' . '<input name = "" id = edit_field class= table_length disabled value = ' . $row["title"] . '>'. '</td>');
                echo  ('<td>'. '<input name = "tariff_price_id" id = edit_field class= table_length_id value = ' . $row["tariff_price_id"] . '>' . '</td>');
                echo ('<td>' . $row["duration"] . '</td>');
                echo  ('<td>'. '<input name = "total_price" id = edit_field class= table_length_price value = '. $row["total_price"] . '>' . '</td>');
                echo "<td><div class='pay_button'><button name='save_button' id ='save_button' type='submit'>Сохранить</button></div></td>";
                echo ("</form>");
                echo "</tr>";
              } 
            }
          ?>
        </tbody>
      </table>
    </div>
  <script src="js/orders.js"></script>
</body>
</html>