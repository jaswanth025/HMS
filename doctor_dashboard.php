<?php
session_start(); // Start the session to access session variables

// Your database connection code goes here
$host = "localhost";
$user = "root";
$password = "";
$db = "hospital";

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email from the session variable
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
// Fetch the doctor's name from the database
$sql = "SELECT name FROM doctor_list WHERE email= '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row and get the doctor's name
    $row = $result->fetch_assoc();


    // Fetch appointments data for the selected doctor from the database
    $sql = "SELECT * FROM appointment WHERE doctor = '$doctorName'";
    $result = $conn->query($sql);

    // Check if there are any appointments
    if ($result->num_rows > 0) {
        // Fetch each row of the result set and store it in the appointments array
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }
    } else {
        echo "No appointments found for this doctor.";
    }
} else {
    echo "Doctor not found.";
}

// Close the database connection
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
            background-image: url('b4.jpg'); /* Specify the path to your image */
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
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to improve readability */
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
        }

        tbody tr:nth-child(even) td {
            background-color: #444;
        }

        tr:last-child td {
            border-bottom: none;
        }
        h2,h3{
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 >Doctor Dashboard</h2>
        <h3>Welcome, <?php echo $doctorName; ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Patient Age</th>
                    <th>Disease</th>
                    <th>Slot</th>
                    <th>Appointment Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Your PHP code to fetch appointments data from the database and loop through it
                if (!empty($appointments)) {
                    foreach ($appointments as $appointment) {
                        echo "<tr>";
                        echo "<td>" . $appointment['patient_name'] . "</td>";
                        echo "<td>" . $appointment['patient_age'] . "</td>";
                        echo "<td>" . $appointment['disease'] . "</td>";
                        echo "<td>" . $appointment['slot'] . "</td>";
                        echo "<td>" . $appointment['appointment_type'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
