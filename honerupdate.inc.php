<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $Register=$_POST["username"];
    $points=$_POST["points"];
    

    try {
        require_once "dbh.inc.php";

        $sql1 = "SELECT honor_points FROM student WHERE reg_number = :register_number";
        $stm = $pdo->prepare($sql1);
        $stm->execute(array(':register_number' => $Register));
        $currentpoints = $stm->fetchColumn();

        $updatepoint = $currentpoints + $points;

        $sql2 = "UPDATE student SET honor_points = :honor_points WHERE reg_number = :register_number";

        $statement=$pdo->prepare($sql2);
        $statement->execute(array(':honor_points' => $updatepoint, ':register_number' => $Register));
        $pdo=null;
        $statement=null;
        header("Location: admin.php");
        exit();

    } catch (PDOException $e) {
        die("Query Failed :". $e-> getMessage());
    }
}else{
    header("Location: admin.php");
}