<?php 
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'mysql');
  define('DB_NAME', 'test_site');

  $temp = '';
$mysql = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // Символ @ исп. для того, чтобы исключить описание ошибки
    if ($mysql->connect_errno) exit('Ошибка подключения к БД!');
$mysql->set_charset('utf-8');

$sql = "SELECT * FROM orders";
$result = $mysql->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo("id: " . $row["id"]. 
//         " - Name: " . $row["first_name"]. 
//         " - Last name: " . $row["last_name"]. 
//         " - Middle name: " . $row["middle_name"].
//         " - Email: " . $row["email"]. 
//         " - Phone Number: " . $row["phone_number"]. 
//         " - Activity: " . $row["activity"]. 
//         " - Tariff id: " . $row["tariff_id"]. 
//         " - Info id: " . $row["info_id"]. 
//         " - Service type: " . $row["service_type"]. 
//         " - Total: " . $row["total_price"]. 
//         "<br>") ;
//         $temp = $row["id"];
//     }
// } else {
//     echo "0 results";
// }
$mysql->close();

?>

