<?php
$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Nếu chưa tạo database my_guitar_shop1, tự động khởi tạo từ file database.sql
    try {
        $init_pdo = new PDO('mysql:host=localhost;charset=utf8mb4', $username, $password);
        $init_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_file = __DIR__ . '/../database.sql';
        if (file_exists($sql_file)) {
            $sql = file_get_contents($sql_file);
            $init_pdo->exec($sql);
        }
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        $error_message = $ex->getMessage();
        include(__DIR__ . '/../errors/database_error.php');
        exit();
    }
}
?>
