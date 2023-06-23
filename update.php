<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_button'])) {
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

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) {
        exit('Ошибка подключения к БД!');
    }
    $mysqli->set_charset('utf8mb4');

    update($mysqli, $id, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $tariff_price_id, $total_price);

    $mysqli->close();
    header('Location: http://localhost/test_site/orders.php');
}

function update($mysqli, $id, $first_name, $last_name, $middle_name, $phone_number, $email, $activity, $tariff_id, $tariff_price_id, $total_price)
{
    $sql = "UPDATE orders
            SET
            first_name = ?,
            last_name = ?,
            middle_name = ?,
            phone_number = ?,
            email = ?,
            activity = ?,
            tariff_id = ?,
            tariff_price_id = ?,
            total_price = ?
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        'sssssssssi',
        $first_name,
        $last_name,
        $middle_name,
        $phone_number,
        $email,
        $activity,
        $tariff_id,
        $tariff_price_id,
        $total_price,
        $id
    );
    $stmt->execute();
    $stmt->close();
}
?>
