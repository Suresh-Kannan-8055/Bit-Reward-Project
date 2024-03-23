<!DOCTYPE html>
<html lang="en">
<head>
<title>View Hp/Rp</title>
<style>
     body{
        margin: 0;
        padding: 0;
        background-color: #003366;
        color:white;
        font-family: Arial;
    }
    h1{
        text-align: center;
        font-size: 40px;
    }
    .container{
        width:400px;
        height:250px;
        margin: 100px auto;
        padding:30px;
        background-color: #45a049;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        text-align: center;
    }
    input{
        width:91%;
        padding: 18px;
        margin: 20px 0;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    button{
        width:100%;
        padding: 15px;
        background-color: #003366;
        cursor: pointer;
        margin-top: 5px;
        border-radius: 5px;
        border: none;
        color: white;
        font-size: 18px;
    }
    .output{
        font-size: 40px;
        position:absolute;
        top:350px;
        left:41.5%;
        text-align: center;
        color: red;
        font-weight: bolder;
    }
    .btn {
        width:100px;
        background-color: #45a049;
        color: white;
        border: none;
        border-radius: 5px;
        padding:10px 30px;
        font-size: 15px;
        cursor: pointer;
        position: absolute;
        right:50px;
        top:20px;
        transition: transform 0.3s ease-in-out;
    }
    .btn:hover{
    transform: scale(0.95);
}
</style>
</head>
<body>
    <header>
        <h1>View Hp/Rp</h1>
        <button class="btn" type="submit" onclick="window.history.back();">Back</button>
    </header>
    <form class="container" action="" method="post">
    <input type="text" id="searchInput" name="register" placeholder="Register Number">
    <button id="searchButton" type="submit">Search</button>
</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "students_details");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register = $_POST["register"];

    $sql = "SELECT honor_points FROM student WHERE reg_number = ?";
    
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $register);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p class='output'>Points :" . $row["honor_points"] . "</p>";
    } else {
        echo "<p class='output' style='left:38%;'>No records found.</p>";
    }

}

$conn->close();
?>

</body>
</html>
