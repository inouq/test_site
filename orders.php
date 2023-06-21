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
        <th>№ Заказа</th>
        <th>Дата заказа</th>
        <th>Статус</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>001</td>
        <td>01.01.2022</td>
        <td>Ожидает обработки</td>
      </tr>
      <tr>
        <td>002</td>
        <td>02.01.2022</td>
        <td>Обработка завершена</td>
      </tr>
      <tr>
        <td>003</td>
        <td>03.01.2022</td>
        <td>Отправлено</td>
      </tr>
    </tbody>
  </table>
</body>
</html>