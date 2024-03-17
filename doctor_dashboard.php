<?php
session_start(); 


$host = "localhost";
$user = "root";
$password = "";
$db = "hospital";


$conn = new mysqli($host, $user, $password, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];

$doctorNames = array(
    "dr.rajesh.kumar@gmail.com" => "Dr. Rajesh Kumar",
    "dr.priya.sharma@gmail.com" => "Dr. Priya Sharma",
    "dr.vivek.patel@gmail.com" => "Dr. Vivek Patel",
    "dr.anjali.desai@gmail.com" => "Dr. Anjali Desai",
    "dr.sanjay.gupta@gmail.com" => "Dr. Sanjay Gupta",
    "dr.deepika.singh@gmail.com" => "Dr. Deepika Singh",
    "dr.rahul.shah@gmail.com" => "Dr. Rahul Shah",
    "dr.pooja.mehta@gmail.com" => "Dr. Pooja Mehta",
    "dr.manoj.joshi@gmail.com" => "Dr. Manoj Joshi",
    "dr.aarti.sharma@gmail.com" => "Dr. Aarti Sharma"
);

$doctorName = $doctorNames[$email];

if (isset($_POST['mark_done'])) {
    $appointmentId = $_POST['appointment_id'];
        $updateSql = "UPDATE appointment SET status = 'done' WHERE id = $appointmentId";
    if ($conn->query($updateSql) === TRUE) {

        $deleteSlotSql = "DELETE FROM slot_booking WHERE doctor = '$doctorName' AND slot IN (SELECT slot FROM appointment WHERE id = $appointmentId)";
        if ($conn->query($deleteSlotSql) === TRUE) {

            $deleteAppointmentSql = "DELETE FROM appointment WHERE id = $appointmentId";
            if ($conn->query($deleteAppointmentSql) === TRUE) {

                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error deleting appointment record: " . $conn->error;
            }
        } else {
            echo "Error deleting slot booking record: " . $conn->error;
        }
    } else {
        echo "Error updating appointment record: " . $conn->error;
    }
}


$sql = "SELECT * FROM appointment WHERE doctor = '$doctorName'";
$result = $conn->query($sql);

// Check if there are any appointments
if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
} else {
    echo "No appointments found for this doctor.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <style>
        body {
            background-image: url('b4.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
        }

        h2 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #fff;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }

        td {
            background-color: #333;
            color: white; 
        }

        tbody tr:nth-child(even) td {
            background-color: #444;
        }

        tr:last-child td {
            border-bottom: none;
        }

        h2, h3 {
            color: black;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class= "home" style="postion : relative" >
        <button onclick="window.location.href = 'home.php';" style="float:right; text-decoration: None ; width: 75px; border-radius: 5px; margin-right:20px" ><p>Home</p></button>
    </div>
    <div class="container">
        <h2>Doctor Dashboard</h2>
        <h3>Welcome, <?php echo $doctorName; ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Patient Age</th>
                    <th>Disease</th>
                    <th>Slot</th>
                    <th>Appointment Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (!empty($appointments)) {
                    foreach ($appointments as $appointment) {
                        echo "<tr>";
                        echo "<td>" . $appointment['patient_name'] . "</td>";
                        echo "<td>" . $appointment['patient_age'] . "</td>";
                        echo "<td>" . $appointment['disease'] . "</td>";
                        echo "<td>" . $appointment['slot'] . "</td>";
                        echo "<td>" . $appointment['appointment_type'] . "</td>";
                        echo "<td>";
                    
                        if ($appointment['status'] != 'done') {
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='appointment_id' value='" . $appointment['id'] . "'>";
                            echo "<input type='submit' name='mark_done' value='Mark as Done'>";
                            echo "</form>";
                        } else {
                            echo "Done";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
