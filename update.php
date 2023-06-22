<?php 
// Код для формы создания записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_button'])){
  $id = $_POST['orders_id'];
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $middle_name = $_POST['middle-name'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $activity = $_POST['activity'];
  $tariff_id = $_POST['tariff_id'];
  $tariff_price_id = $_POST['tariff_price_id'];
  $total_price = $_POST['total_price'];

  $mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // Символ @ исп. для того, чтобы исключить описание ошибки
    if ($mysql->connect_errno) exit('Ошибка подключения к БД!');
  $mysql->set_charset('utf-8');
  $a = update ($mysql, $id, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $tariff_price_id, $total_price);
  $mysql->close();
  header('Location: http://localhost/test_site/orders.php');
}

  // Обновление в БД
function update($mysqli, $id, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $tariff_price_id, $total_price) {
  $sql = "UPDATE orders
  SET
  first_name = 'first_name2',
  last_name = 'last_name2',
  middle_name = 'middle_name2',
  phone_number = 'phone_number2',
  email = 'email2',
  activity = 'activity2',
  tariff_id = 'tariff_id2',
  tariff_price_id = 'tariff_price_id2',
  total_price = 'total_price2'
  WHERE id = 'orders_id2'";

  $search = array ('orders_id2', 'last_name2','first_name2','middle_name2', 'phone_number2', 'email2', 'activity2', 'tariff_id2', 'tariff_price_id2',
'total_price2');
  $replace = array ($id, $last_name, $first_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $tariff_price_id, $total_price);
  $sql = str_replace($search, $replace, $sql);
  $mysqli->query($sql);
  return;
}
?>