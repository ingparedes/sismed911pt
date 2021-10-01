<?php
class connection
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $connect;
    private $url;

    function __construct()
    {
        $this->host = "localhost";
        $this->db = "sismed911";
        $this->user = "postgres";
        $this->pass = "root";
        $this->connect = "host=" . $this->host . " dbname=" . $this->db . " user=" . $this->user . " password=" . $this->pass;
    }

    function connect()
    {
        try {
            $this->url = pg_connect($this->connect);
            if (!$this->url)
                throw new Exception("Error PostgreSQL " . pg_last_error());
        } catch (Exception $e) {
            die("El error de Conexión es: " . $e->getMessage());
        }
        return $this->url;
    }

    function execute($connection = null, $sql)
    {
        $query = pg_query($connection, $sql);
        if (!$query)
            throw new Exception("Error PostgreSQL " . pg_last_error());
        return $query;
    }

    function __destruct()
    {
        pg_close($this->url);
    }
}
