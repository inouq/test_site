<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'test_site');

// Код для формы создания записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_record'])) {
  $tariff = $_POST['tariff'];
  $duration = $_POST['duration'];

  $tariff_id = '';
  $duration_id = '';
  $service_type = '';
  $total_price = '';

  switch ($tariff) {
    case "Тариф 'Гость'":
      $tariff_id = '1';
      $service_type = 'workspace';

      switch ($duration) {
        case "4 часа":
          $duration_id = '1';
          $total_price = '300';
          break;
        case "1 день":
          $duration_id = '2';
          $total_price = '400';
          break;
        case "1 месяц":
          $duration_id = '3';
          $total_price = '3500';
          break;
        default:
          $duration_id = '4';
          $total_price = '9000';
          break;
      }
      break;

    case "Тариф 'Резидент'":
      $tariff_id = '2';
      $service_type = 'workspace';

      switch ($duration) {
        case "1 месяц":
          $duration_id = '5';
          $total_price = '4500';
          break;
        default:
          $duration_id = '6';
          $total_price = '12000';
          break;
      }
      break;

    case "Тариф 'Агентство'":
      $tariff_id = '3';
      $duration_id = '7';
      $service_type = 'workspace';
      $total_price = '0';
      break;

    case "'Конференц-Зал'":
      $tariff_id = '5';
      $duration_id = substr($duration, 0, 1); // Берём первый символ из строки
      $service_type = 'hall';
      $total_price = (int)$duration_id * 500;
      break;

    case "Переговорка":
      $tariff_id = '4';
      $service_type = 'meeting_room';

      switch ($duration) {
        case '1 час':
          $duration_id = '1';
          $total_price = '200';
          break;
        case 'Пол дня (4 часа)':
          $duration_id = '2';
          $total_price = '500';
          break;
        default:
          $duration_id = '3';
          $total_price = '900';
          break;
      }
      break;
  }

  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $middle_name = $_POST['middle-name'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $activity = $_POST['activity'];

  $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($mysqli->connect_errno) {
    exit('Ошибка подключения к БД!');
  }
  $mysqli->set_charset('utf8');

  insert($mysqli, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $duration_id, $service_type, $total_price);

  $mysqli->close();
}

// Запись в таблицу БД
function insert($mysqli, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $duration_id, $service_type, $total_price) {
  $sql = "INSERT INTO `orders` (`first_name`, `last_name`, `middle_name`, `phone_number`, `email`, `activity`, `tariff_id`, `tariff_price_id`, `service_type`, `total_price`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $statement = $mysqli->prepare($sql);
  $statement->bind_param("ssssssiiis", $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $duration_id, $service_type, $total_price);
  $statement->execute();
}
?>