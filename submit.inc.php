<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $Username=$_POST["user_name"];
    $Register=$_POST["register"];
    $Department=$_POST["department"];
    $Batch=$_POST["Batch"];
    $Gender=$_POST["Gender"];
    $Project_name=$_POST["projectname"];
    $Team_members=$_POST["members"];
    $Duration=$_POST["duration"];
    $Outcome=$_POST["outcome"];
    $Link=$_POST["link"];

    try {
        require_once "dbh.inc.php";
        $sql="INSERT INTO student(username, reg_number, department, batch, gender, project_name, team_members, duration, outcome, link) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $statement=$pdo->prepare($sql);
        $statement->execute([$Username, $Register, $Department, $Batch, $Gender, $Project_name, $Team_members, $Duration, $Outcome, $Link]);
        $pdo=null;
        $statement=null;
        header("Location: submit.html");
        exit();

    } catch (PDOException $e) {
        die("Query Failed :". $e-> getMessage());
    }
}else{
    header("Location: submit.html");
}