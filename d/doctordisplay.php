<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "hospital";

$data = mysqli_connect($host, $user, $password, $db);
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

$vari = "";
session_start();
$dp = $_SESSION["department"];
echo $dp;
$sql = "SELECT * FROM appointment where department = '{$dp}'";

echo "<b> <center>appointments</center> </b> <br> <br>";
echo "<td  width='10%'><a href='home.php' class='non-style-link'><p class='nav-item' style='padding-right: 10px;'>LOG OUT</p></a></td>";

if ($result = $data->query($sql)) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $count++;
        $field1name = $row["patient_name"];
        $field2name = $row["patient_age"];
        $field3name = $row["patient_phoneno"];
        $field4name = $row["disease"];
        $field5name = $row["doctor"];
        $field6name = $row['appointment_date'];
        $vari = $vari . "<tr><th style='padding-left:100px;'scope='row'>$count</th><td>$field1name</td><td>$field2name</td><td>$field3name</td><td>$field4name</td><td>$field6name</td></tr>";
    }
    $result->free();
}

echo "<table class='table table-hover' style='background-image:linear-gradient(to right,light blue,white);'><thead><tr><th style='padding-left:100px;'scope='col'>s.no</th><th scope='col'>name</th><th scope='col'>age</th><th scope='col'>phoneno</th><th scope='col'>disease</th><th scope='col'>appointment date</th></tr></thead><tbody>$vari</tbody></table>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://wallpaperboat.com/wp-content/uploads/2020/09/21/55222/medical-10.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
