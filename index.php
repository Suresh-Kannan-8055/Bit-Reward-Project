<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
<style>
    body{
        margin: 0;
        padding: 0;
        background: linear-gradient(to top,rgba(0, 0, 0, 0.5)50%,rgba(0, 0, 0, 0.5)50%),url("https://www.bitsathy.ac.in/wp-content/uploads/Research-Park.jpg");
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .login{
        width:400px;
        height: 300px;
        margin: 150px auto;
        padding:30px;
        background-color: #45a049f0;
        border-radius: 10px;
        background-attachment: fixed;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    h2{
        text-align: center;
        font-size: 40px;
        margin-top: 0;
        margin-bottom: 20px;
        color: white;
    }
    input{
        width:93%;
        padding: 15px;
        margin: 10px 0;
        border-radius: 3px;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    #error{
        font-size: 16px;
        color: red;
        margin-top: 3px;
        margin-bottom: 0;
        text-align: center;
        text-decoration: underline;
    }       
    button{
        width:300px;
        padding: 13px;
        background-color: #003366;
        cursor: pointer;
        margin: 40px 50px;
        border-radius: 5px;
        border: none;
        color: white;
        font-size: 15px;
    }
</style>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form action="" method="post" onsubmit=" return validateForm()">
            <input type="text" id="username" name="username" placeholder="Username" >
            <input type="password" id="password" name="password" placeholder="S/Fddhhmm" style="margin-bottom: 5px;" >
            <p id="error" style="display: none;">Please fill all fields</p>
            <button type="submit">Login</button>
        </form>
    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            if (preg_match('/^S\d{6}$/', $password))  {
                $username="";
                $password="";
                header("Location: submit.html");
                exit;
            } 
            elseif (preg_match('/^F\d{6}$/', $password))  {
                $username="";
                $password="";
                header("Location: admin.php");
                exit;
            }
            else{
                header("Location: index.php");
                exit;
            }
        }
    ?>

    <script> 
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username === "" || password === "") {
                document.getElementById('error').style.display = 'block';
                return false;
            }
            else {
                username="";
                password="";
                return true;
            }

        }
    </script>
</body>
</html>
