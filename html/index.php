<?php

$databaseHost = 'db';
$databaseUsername = 'root';
$databasePassword = 'notSecureChangeMe';
$databaseName = 'maria_db';

// Создание подключения
// $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Проверка подключения
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

$sqlTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if($mysqli->query($sqlTable) === true) {
    echo "TABLE CREATED";
} else {
    echo "ERROR" . $mysqli->error;
}

// Закрытие подключения
// $mysqli->close();

if(!empty($_POST['name']) && !empty($_POST['password'])) {
    $sqlNewUser = $mysqli->prepare("INSERT INTO users (username, password) VALUES(?,?)"); 
    $sqlNewUser->bind_param('ss',$_POST['name'],$_POST['password']);
    $sqlNewUser->execute();
}
 
?>

<div>
    <form action="/" method="post">
        <input name="name" type="text" value="">
        <input name="password" type="password" value="">
        <button type="submit">ОТПРАВИТЬ</button>
    </form>
</div>