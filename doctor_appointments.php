<?php 
$error='';

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is invalid";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $host = "localhost";
        $user = "root";
        $password_db = ""; // Update with your database password
        $db = "hospital";

        // Create connection
        $data = new mysqli($host, $user, $password_db, $db);

        // Check connection
        if ($data->connect_error) {
            die("Connection failed: " . $data->connect_error);
        }

        // Prepare and execute the SQL statement to check if the email and password match
        $sql = "SELECT * FROM doctor_list WHERE email = ? AND password = ?";
        $stmt = $data->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any row is returned
        if ($result->num_rows > 0) {
            // Start a session and store the email
            session_start();
            $_SESSION['email'] = $email;
            
            // Redirect to the doctor's dashboard
            header("Location: doctor_dashboard.php");
            exit;
        } else {
            // Display error message if no matching user is found
            $error = "Invalid email or password";
        }

        // Close the database connection
        $data->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="animations.css">  
    <link rel="stylesheet" href="main.css">  
    <link rel="stylesheet" href="index.css">
</head>
<body class="bg-light">
    <div class="full-height">
        <center>
            <table border="0">
                <tr>
                    <td width="80%">
                        <font class="edoc-logo">Apollo Hospitals </font>
                        <font class="edoc-logo-sub">| Saving lives</font>
                    </td>
                    <td  width="10%">
                        <a href="home.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">HOME</p></a>
                    </td>
                </tr>
            </table>
        </center>
        <div class="container mt-5" id="sai">
            <div class="card w-50 mx-auto">
                <div class="card-header">
                    <h2 class="text-center">Doctor Login</h2>
                </div>
                <div class="card-body">
                    <div style="margin-bottom:10px;margin-left:-5px;padding:10px;">
                        <p style="margin-left:140px;padding-left:50px;padding-right:10px;padding-top:12px;padding-bottom:12px;background-color:blue;color:black;list-style-type:none;text-decoration:none;margin-right:130px;color:white;">DOCTOR LOGIN</p>
                    <br>
                    </div>
                    <form id="loginForm" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                    </form>
                    <p id="error-message" class="mt-3 text-danger text-center"><?php echo $error; ?></p> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="login.js"></script>
</body>
</html>
