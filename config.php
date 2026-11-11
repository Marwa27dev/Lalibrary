
<?php
$host = "localhost";
$username = getenv("u779137547_library");
$password = getenv("Webmarket0");
$dbname = getenv("u779137547_lalibrary");

try {
    $cnx = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit("Erreur de connexion à la base de données.");
}
?>
