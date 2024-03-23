<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
    <h1>Students Details</h1>
    <button class="back" type="submit" onclick="window.history.back();">Back</button>
    </header>
    <div class="View" style="display: block;">
        <h2>Honer Points</h2>
        <form action="honerupdate.inc.php" method="post" onsubmit=" return validateForm()">
            <input type="text" id="username" name="username" placeholder="Register Number" >
            <input type="text" id="points" name="points" placeholder="Honer Points" style="text-align: center; color: red; font-size: 25px; font-weight: bolder;" >
            <p id="error" style="display: none;">Please fill all fields</p>
            <button type="submit">ADD</button>
        </form>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Register Number</th>
            <th>Department</th>
            <th>Batch</th>
            <th>Gender</th>
            <th>Project Name</th>
            <th>Team Members</th>
            <th>Duration</th>
            <th>Honor</th>
            <th>Link</th>
        </tr>
        <?php
            $conn=mysqli_connect("localhost","root","","students_details");
            if($conn-> connect_error){
                die("Connection Failed:".$conn-> connect_error);
            }
            $sql="SELECT username, reg_number, department, batch, gender, project_name, team_members, duration, honor_points, link FROM student";
            $result=$conn-> query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["username"]."</td><td>".$row["reg_number"]."</td><td>".$row["department"]."</td><td>".$row["batch"]."</td><td>".$row["gender"]."</td><td>".$row["project_name"]."</td><td>".$row["team_members"]."</td><td>".$row["duration"]." month</td><td>".$row["honor_points"]." Points</td><td><a target='_blank' href=". $row["link"].">Link&#128279;</a></td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "";
            }

            $conn-> close();
        ?>
    </table>
    
    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('points').value;

            if (username === "" || password === "") {
                document.getElementById('error').style.display = 'block';
                return false;
            }
            else {
                username.value="";
                password.value="";
                return true;
            }

        }
    </script>
</body>
</html>