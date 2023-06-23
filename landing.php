<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'test_site');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    exit('Ошибка подключения к БД!');
}

$mysqli->set_charset('utf8mb4');

$tempTableQuery = "CREATE TABLE IF NOT EXISTS temp (
    tariff_id INT,
    tariff_name TEXT,
    tariff_price_id INT,
    tariff_duration TEXT,
    tariff_sum INT
)";

$mysqli->query($tempTableQuery);

$tariffPricesQuery = "SELECT 
    tp.id AS prices_id,
    tp.id_tariff AS tariff_id,
    t.title AS tariff_name,
    tp.duration,
    tp.sum AS total_price
FROM
    tariff_prices AS tp
    LEFT JOIN tariffs AS t ON tp.id_tariff = t.id";

$result = $mysqli->query($tariffPricesQuery);
if ($result->num_rows > 0) {
    $insertQuery = "INSERT INTO temp (tariff_id, tariff_name, tariff_price_id, tariff_duration, tariff_sum)
        VALUES (?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("isiss", $tariffId, $tariffName, $priceId, $duration, $totalPrice);

    while ($row = $result->fetch_assoc()) {
        $tariffId = $row['tariff_id'];
        $tariffName = $row['tariff_name'];
        $priceId = $row['prices_id'];
        $duration = $row['duration'];
        $totalPrice = $row['total_price'];

        $stmt->execute();
    }

    $stmt->close();
}

$ordersQuery = "SELECT
    o.id,
    o.first_name,
    o.last_name,
    o.middle_name,
    o.email,
    o.phone_number,
    o.activity,
    o.tariff_id,
    t.tariff_name AS title,
    o.tariff_price_id,
    t.tariff_duration AS duration,
    o.total_price
FROM
    orders AS o
    LEFT JOIN temp AS t ON o.tariff_price_id = t.tariff_price_id";

$result = $mysqli->query($ordersQuery);

$tempTableDropQuery = "DROP TABLE IF EXISTS temp";
$mysqli->query($tempTableDropQuery);

$mysqli->close();
?>