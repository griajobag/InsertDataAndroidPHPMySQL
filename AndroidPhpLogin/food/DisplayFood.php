<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 1/24/2017
 * Time: 10:31 AM
 */
require_once("../db/Connection.php");
class DisplayFood{
    function getAllFood(){
        $connection = new Connection();
        $con = $connection->getConnection();

        try{
            $getFood = $con->prepare("SELECT * FROM food");
            $getFood->execute();

            $result = $getFood->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $data){
                echo "Food Name : ". $data['foodname'];
                echo "<br>";
                echo "Food QTY : " . $data['foodqty'];
                echo "<br><br>";
            }
        }catch (PDOException $e){
            echo "Error " . $e->getMessage();
        }
    }
}

$food = new DisplayFood();
$food->getAllFood();