<?php

/**
 * Description of Database
 *
 * @author RSD2G6TanZinWei <tanzw-wm19@student.tarc.edu.my>
 */
class ConnectDatabase {

    private static $instance = null;
    private $db;

    public function __construct() {
        $servername = 'localhost';
        $dbname = 'collegedb';
        $username = 'root';
        $password = '';
        try {
            $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new ConnectDatabase();
        }
        return self::$instance;
    }

    public function addSubject($code, $title, $credit, $yearOfStudy) {
        $sql = "INSERT INTO subjects (code, title, credit, yearOfStudy) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($code, $title, $credit, $yearOfStudy);
        if ($stmt) {
            echo "Add Succefully!!!";
        } else {
            echo "Add Fail!!!";
        }
    }

    public function displaySubject($selectQuery) {
        $stmt = $this->db->prepare($selectQuery);
        $stmt->execute();
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

}
