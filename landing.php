<?php 
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'mysql');
  define('DB_NAME', 'test_site');

$mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // Символ @ исп. для того, чтобы исключить описание ошибки
    if ($mysql->connect_errno) exit('Ошибка подключения к БД!');
$mysql->set_charset('utf-8');
$temp_table = "CREATE TABLE temp
(tariff_id int, 
tariff_name text, 
tariff_price_id int, 
tariff_duration text, 
tariff_sum int)";

$mysql->query($temp_table);

$temp_table = "SELECT 
tariff_prices.id AS prices_id, 
tariff_prices.id_tariff AS tariff_id,
tariffs.title AS tariff_name,
tariff_prices.duration AS duration,
tariff_prices.sum AS total_price
FROM tariff_prices
LEFT JOIN tariffs
ON tariff_prices.id_tariff = tariffs.id";

$result = $mysql->query($temp_table);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $temp_table = "INSERT INTO temp
    (tariff_id,	tariff_name,	tariff_price_id,	tariff_duration,	tariff_sum)
    VALUES ('tariff_id2', 'tariff_name2',	'tariff_price_id2',	'tariff_duration2',	'tariff_sum2')";
    $search = array ('tariff_id2','tariff_name2','tariff_price_id2', 'tariff_duration2', 'tariff_sum2');
    $replace = array ($row['tariff_id'], $row['tariff_name'], $row['prices_id'], $row['duration'], $row['total_price']);
    $temp_table = str_replace($search, $replace, $temp_table);
    $mysql->query($temp_table);
  }
};
$sql = "SELECT
orders.id,
orders.first_name,
orders.last_name,
orders.middle_name,
orders.email,
orders.phone_number,
orders.activity,
orders.tariff_id,
temp.tariff_name AS title,
orders.tariff_price_id,
temp.tariff_duration AS duration,
orders.total_price
FROM orders
LEFT JOIN temp
ON orders.tariff_price_id = temp.tariff_price_id"
;

$result = $mysql->query($sql);
$temp_table = "DROP TABLE temp";
$mysql->query($temp_table);
$mysql->close();
?>

