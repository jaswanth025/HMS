<?php
    session_start();
?>
<?php 
    $error='';
    if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
    $name=$_POST['name'];
    $age=$_POST['age'];
    $phoneno=$_POST['phone'];
    $email = $_POST['email'];
    $usernames=$_POST['username'];
    $passwords=$_POST['pass'];
    $host="localhost";
    $user="root";
    $password="";
    $db="hospital";
    $_SESSION["name"]=$name;
    $_SESSION["age"]=$age;
    $_SESSION["phone"]=$phoneno;
    $_SESSION["email"]=$email;
    $data=mysqli_connect($host,$user,$password,$db);
    if ($data->connect_error) {
        die("Connection failed: " . $data->connect_error);
    }
    $sql = "insert into registration (username, passwords, name, age, phoneno, email) values('$usernames','$passwords','$name','$age','$phoneno','$email')";
    $result = $data->query($sql);
    echo $result;
    if ($result>0) {
        header("Location: type.php"); 
    } else {
    echo "0 results";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registration Page</title>
    <link rel="stylesheet" href="animations.css">  
    <link rel="stylesheet" href="main.css">  
    <link rel="stylesheet" href="index.css">
    <style>
        .btn{
            border-radius:15px;
        }
    </style>
</head>
<body class="bg-light">
<div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td width="80%">
                    <font class="edoc-logo">Apollo Hospitals </font>
                    <font class="edoc-logo-sub">| Saving lifes</font>
                </td>
                <td  width="10%">
                    <a href="home.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">HOME</p></a>
                </td>
            </tr>
</table>
    <div class="container mt-5">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <h2 class="text-center">Registration</h2>
            </div>
            <div class="card-body">
            <div style="margin-bottom:10px;margin-left:-5px;padding:10px;">
                <a  class="btn btn-success btn-block" href="patient_signup.php"style="margin-left:0px;padding-left:110px;padding-right:125px;padding-top:12px;padding-bottom:12px;color:black;list-style-type:none;text-decoration:none;color:white">PATIENT REGISTRATION</a>
                <!-- <a href="doctor_signup.php"style="padding-left:50px;padding-right:50px;list-style-type:none;text-decoration:none;">DOCTOR REGISTRATION</a> -->
                <br></div>
                <form id="registrationForm" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name:</label>
                            <input name="name" type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="age">Age:</label>
                            <input name="age" type="number" id="age" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-6">
                            <label for="username">username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="pass" class="form-control" required>
                        </div>
                    <input name="submit" type="submit" value="submit"class="btn btn-success btn-block">
                </form>
                <p id="registration-error-message" class="mt-3 text-danger text-center"></p>
                <p class="mt-3 text-center">Already have an account? <a href="patient_login.php">Login here</a></p>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="registration.js"></script>
</body>
</html>