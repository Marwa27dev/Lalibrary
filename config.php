
<?php
$host = "localhost";
$dbname = "u779137547_lalibrary";
$username = "u779137547_library";
$password = "Webmarket0";

try {
    $cnx = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

    // Connexion établie

} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit("Erreur de connexion MySQL. Consultez les logs PHP.");
}
?>
