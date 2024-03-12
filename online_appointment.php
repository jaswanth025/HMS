<?php
session_start();

$error = '';
if (isset($_POST['submit'])) {
    if (empty($_SESSION['name']) || empty($_SESSION['age']) || empty($_SESSION['phone']) ) {
        $error = "All fields are required";
    } else {
        $name = $_SESSION["name"];
        $age = $_SESSION["age"];
        $phoneno = $_SESSION["phone"];
        $disease = $_POST['disease'];
        $department = $_POST['department'];
        $doctor = $_POST['doctor'];
        $slot = $_POST['slot'];
        $type = 'online';
        $online_meeting_type = $_POST['online_meeting_type'];
        $address = '';
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "hospital";
        $data = mysqli_connect($host, $user, $password, $db);
        if ($data->connect_error) {
            die("Connection failed: " . $data->connect_error);
        }

        // Check if the slot is available for the selected doctor
        $slotQuery = "SELECT * FROM slot_booking WHERE doctor = '$doctor' AND slot = '$slot'";
        $slotResult = $data->query($slotQuery);
        if ($slotResult->num_rows > 0) {
            $error = "Slot is already booked for the selected doctor. Please choose another slot.";
        } else {
            // Proceed with appointment booking
            $sql = "INSERT INTO appointment(patient_name, patient_age, patient_phoneno, disease, department, doctor, appointment_date, appointment_type, online_meeting_type, address, slot) VALUES ('$name', '$age', '$phoneno', '$disease', '$department', '$doctor', NOW(), '$type', '$online_meeting_type', '$address', '$slot')";
            $result = $data->query($sql);
            if ($result) {
                // Update slot booking table
                $slotInsertQuery = "INSERT INTO slot_booking(doctor, slot, appointment_type) VALUES ('$doctor', '$slot', '$type')";
                $slotInsertResult = $data->query($slotInsertQuery);
                if ($slotInsertResult) {
                    header("Location: thankyou.php");
                } else {
                    echo "Error: " . $slotInsertQuery . "<br>" . $data->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $data->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Online Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <h2 class="text-center">Book Online Appointment</h2>
            </div>
            <div class="card-body">
                <form id="registrationForm" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disease">Disease:</label>
                            <input name="disease" type="text" id="disease" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department">Department:</label>
                        <select id="department" name="department" class="form-control" required onchange="outer()">
                            <option value="" selected disabled>Select Department</option>
                            <option value="Allergy and immunology">Allergy and immunology</option>
                            <option value="Anesthesiology">Anesthesiology</option>
                            <option value="Diagnostic radiology">Diagnostic radiology</option>
                            <option value="Cardiovascular disease">Cardiovascular disease</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Pediatrics">Pediatrics</option>
                            <option value="Urology">Urology</option>
                            <option value="Ophthalmology">Ophthalmology</option>
                            <option value="Gynaecology & Obstetrics">Gynaecology & Obstetrics</option>
                        <!-- Other departments here -->
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="doctor">Doctor:</label>
                        <input name="doctor" type="text" id="doctor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="slot">Slot:</label>
                        <select id="slot" name="slot" class="form-control" required>
                            <option value="" selected disabled>Select Slot</option>
                            <option value="9 ">9:00 - 10:00</option>
                            <option value="9 ">10:00 -- 11:00</option>
                            <option value="9 ">11:00 -- 12:00</option>
                            <option value="9 ">12:00 -- 1:00</option>
                            <!-- Other slots here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="online_meeting_type">Online Meeting Type:</label>
                        <select id="online_meeting_type" name="online_meeting_type" class="form-control" required>
                            <option value="" selected disabled>Select Online Meeting Type</option>
                            <option value="Google Meet">Google Meet</option>
                            <!-- Other online meeting types here -->
                        </select>
                    </div>
                    <div class="text-danger"><?php echo $error; ?></div>
                    <input name="submit" type="submit" value="Submit" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
    <script>
             function outer() {
                var doctors = {
                    "Allergy and immunology": "Dr. Rajesh Kumar",
                    "Anesthesiology": "Dr. Priya Sharma",
                    "Diagnostic radiology": "Dr. Vivek Patel",
                    "Cardiovascular disease": "Dr. Anjali Desai",
                    "Neurology": "Dr. Sanjay Gupta",
                    "Pediatrics": "Dr. Rahul Shah",
                    "Urology": "Dr.Pooja Mehta",
                    "Ophthalmology": "Dr. Dr. Manoj Joshi",
                    "Gynaecology & Obstetrics": "Dr. Aarti Sharma"
                };
            var a = document.getElementById("department");
            var v = a.value;
            var p = doctors[v];
            document.getElementById("doctor").value = p;
        }
    </script>
</body>
</html>
