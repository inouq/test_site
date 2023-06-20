<?php 
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'mysql');
  define('DB_NAME', 'test_site');

// Код для формы создания записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_record'])){
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $middle_name = $_POST['middle-name'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $activity = $_POST['activity'];
  $tariff = '';
  $duration ='';
  $service_type = '';
  $total_price = '';

  if ($_POST['tariff'] === "Тариф 'Гость'") {
    if ($_POST['duration'] === "4 часа") {
      $tariff = '1';
      $duration = '1';
      $service_type = 'workspace';
      $total_price = '300';
    } else if($_POST['duration'] === "1 день") {
      $tariff = '1';
      $duration = '2';
      $service_type = 'workspace';
      $total_price = '400';
    } else if($_POST['duration'] === "1 месяц") {
      $tariff = '1';
      $duration = '3';
      $service_type = 'workspace';
      $total_price = '3500';
    }
      else {
      $tariff = '1';
      $duration = '4';
      $service_type = 'workspace';
      $total_price = '9000';
    }
  } else if($_POST['tariff'] === "Тариф 'Резидент'") {
    if ($_POST['duration'] === "1 месяц") {
      $tariff = '2';
      $duration = '5';
      $service_type = 'workspace';
      $total_price = '4500';
    } else {
      $tariff = '2';
      $duration = '6';
      $service_type = 'workspace';
      $total_price = '12000';
    } 
  } else if ($_POST['tariff'] === "Тариф 'Агентство'") {
    $tariff = '3';
    $duration = '';
    $service_type = 'workspace';
    $total_price = '';
  }

  if($_POST['tariff'] === "'Конференц-Зал'") {
    $tariff = '5';
    $duration = $_POST['duration'];
    $duration = $duration[0]; // Берём первый символ из строки
    $service_type = 'hall';
    $total_price = (int)$duration * 500; // Переменную duration привожу в числовое значение
  }

  if($_POST['tariff'] === "Переговорка") {
    $tariff = '4';
    $service_type = 'meeting_room';
  
    if ($_POST['duration'] === '1 час') {
      $duration = '1';
      $total_price = '200';
    } else if($_POST['duration'] === 'Пол дня (4 часа)') {
      $duration = '2';
      $total_price = '500';

    } else {
      $duration = '3';
      $total_price = '900';
    }
  }

  $mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // Символ @ исп. для того, чтобы исключить описание ошибки
    if ($mysql->connect_errno) exit('Ошибка подключения к БД!');
  $mysql->set_charset('utf-8');
  $a = insert ($mysql, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff, $duration, $total_price, $service_type);
  $mysql->close();
}

  // Запись в таблицу БД
function insert($mysqli, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff, $duration, $total_price, $service_type) {
// 
  $sql = "INSERT INTO `orders` 
  (`first_name`, 
  `last_name`,
  `middle_name`, 
  `phone_number`, 
  `email`, 
  `activity`, 
  `tariff_id`, 
  `info_id`, 
  `service_type`, 
  `total_price`) 
  VALUES ('first_name2', 
  'last_name2',
  'middle_name2', 
  'phone_number2',
  'email2', 
  'activity2', 
  'tariff2', 
  'duration2',
  'service_type2',
  'total_price2')";

  $search = array ('last_name2','first_name2','middle_name2', 'phone_number2', 'email2', 'activity2', 'tariff2', 'duration2', 'service_type2',
  'total_price2');
  $replace = array ($last_name, $first_name, $middle_name, $phone_number, $email, $activity, $tariff, $duration, $service_type, $total_price);
  $sql = str_replace($search, $replace, $sql);
  $mysqli->query($sql);
  return;
}
?>