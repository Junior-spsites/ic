<?php
try {
    global $pdo;
    $pdo = new PDO("mysql:dbname=ic;host=localhost", "root");

}catch(PDOException $e) {
    echo "ERRO:" .$e->getMessage();
    exit;
}
$limite = 2;

$patentes = array(

);
