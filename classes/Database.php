<?php

class Database
{
    public static $username = "root";
    public static $password = "";
    public static $connectionString = "mysql:host=localhost;dbname=calorie_meter";

    public static function connect()
    {
        try {
            $pdo = new PDO(self::$connectionString, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "<div style='height: 40px;
            width: 100%;
            color: white;
            background-color: red;
            display: flex;
            justify-content: center;
            align-items: center;'>Failed to connect to the database </div>";
            return;
        }
    }

    public static function query($query, $params = array())
    {
        $conn = self::connect();
        if($conn != null){
            $statement = $conn->prepare($query);
            $result = $statement->execute($params);
            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
            if(explode(' ', $query)[0] == 'INSERT'){
                return $result;
            }
        }
        return;
    }
}
