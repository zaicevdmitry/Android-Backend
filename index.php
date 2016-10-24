<?php
//
//ini_set('display_errors', 1);
//require_once 'application/bootstrap.php';


class Model_Api
{
    private $db_host = "localhost";
    private $db_name = "test";
    private $db_user = "root";
    private $db_pass = "";

    public function __construct($username = null, $password = null)
    {
        $this->username = $username;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function connectDb($db_name, $db_user, $db_pass, $db_host = "localhost")
    {
        try {
            $this->db = new \pdo("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (\pdoexception $e) {
            echo "database error: " . $e->getmessage();
            die();
        }
        $this->db->query('set names utf8');

        return $this;
    }

    public function start(){
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    public function getRecipes()
    {
        $query = "SELECT *  FROM recipe ORDER BY id";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }
}

$api = new Model_Api();

$api->getRecipes();