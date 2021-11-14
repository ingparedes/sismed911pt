<?php
include_once 'connection.php';

$connection = new connection();
$connect = $connection->connect();

$option = (isset($_POST['option'])) ? $_POST['option'] : '';

switch ($option) {
    case 'selectAmbulance':
        $sql = "SELECT * FROM ambulancias WHERE marca IS NOT NULL ORDER BY cod_ambulancias";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
    case 'selectAmbulanceReport':
        $sql = "SELECT marca AS x, count(marca) AS y FROM ambulancias WHERE marca IS NOT NULL GROUP BY marca ORDER BY marca";
        print json_encode(pg_fetch_all($connection->execute($connect, $sql)), JSON_UNESCAPED_UNICODE);
        break;
}
