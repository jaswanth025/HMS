<?php
session_start();

// Check if the appointment type is stored in the session, set default to 'normal' if not set
$appointment_type = isset($_SESSION['type']) ? $_SESSION['type'] : 'normal';

$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['disease'])) {
        $error = "Disease field is required";
    } else {
        if (isset($_SESSION["name"])) {
            $name = $_SESSION["name"];
            $age = $_SESSION["age"];
            $phoneno = $_SESSION["phone"];
            $disease = $_POST['disease'];
            $department = $_POST['department'];
            $doctor = $_POST['doctor'];
            $slot = $_POST['slot'];
            $type = $_POST['type']; // New type field
            // Store appointment type retrieved from session or default to 'normal'
            $appointment_type = isset($_SESSION['type']) ? $_SESSION['type'] : 'normal';
            echo $appointment_type;
            $online_meeting_type = ($appointment_type == 'online') ? $_POST['online_meeting_type'] : '';
            $address = ($appointment_type == 'doorstep') ? $_POST['address'] : '';
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "hospital";
            $_SESSION["department"] = $department;
            $data = mysqli_connect($host, $user, $password, $db);
            if ($data->connect_error) {
                die("Connection failed: " . $data->connect_error);
            }

            // Check if the slot is available for the selected doctor
            $slotQuery = "SELECT * FROM slot_booking WHERE doctor = '$doctor' AND slot = '$slot' AND type = '$type'";
            $slotResult = $data->query($slotQuery);
            if ($slotResult->num_rows > 0) {
                $error = "Slot is already booked for the selected doctor. Please choose another slot.";
            } else {
                // Proceed with appointment booking
                $sql = "INSERT INTO appointment(patient_name, patient_age, patient_phoneno, disease, department, doctor, appointment_date, appointment_type, online_meeting_type, address, slot) VALUES ('$name', '$age', '$phoneno', '$disease', '$department', '$doctor', NOW(), '$appointment_type', '$online_meeting_type', '$address', '$slot')";
                $result = $data->query($sql);
                if ($result) {
                    // Update slot booking table
                    $slotInsertQuery = "INSERT INTO slot_booking(doctor, slot, appointment_type) VALUES ('$doctor', '$slot', '$appointment_type')";
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
}
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Appointment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card w-75 mx-auto">
                <div class="card-header">
                    <h2 class="text-center">Book Appointment</h2>
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
                                <!-- Other options here -->
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doctor">Doctor:</label>
                            <input name="doctor" type="text" id="doctor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="appointment_type">Appointment Type:</label>
                            <select id="appointment_type" name="appointment_type" class="form-control" required onchange="changeAppointmentType()">
                                <option value="normal" <?php if ($appointment_type == 'normal') echo 'selected'; ?>>Normal</option>
                                <option value="online" <?php if ($appointment_type == 'online') echo 'selected'; ?>>Online</option>
                                <option value="doorstep" <?php if ($appointment_type == 'doorstep') echo 'selected'; ?>>Doorstep</option>
                            </select>
                        </div>
                        <div id="online_meeting_type_field" class="form-group" <?php if ($appointment_type != 'online') echo 'style="display: none;"'; ?>>
                            <label for="online_meeting_type">Online Meeting Type:</label>
                            <select id="online_meeting_type" name="online_meeting_type" class="form-control">
                                <option value="" selected disabled>Select Online Meeting Type</option>
                                <option value="Google Meet">Google Meet</option>
                                <option value="Google Meet">Zoom</option>
                                <option value="Google Meet">Microsoft Teams</option>
                            </select>
                        </div>
                        <div id="address_field" class="form-group" <?php if ($appointment_type != 'doorstep') echo 'style="display: none;"'; ?>>
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="slot">Slot:</label>
                            <select id="slot" name="slot" class="form-control" required>
                                <option value="" selected disabled>Select Slot</option>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                            </select>
                        </div>

                        <input name="submit" type="submit" value="Submit" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function changeAppointmentType() {
                var appointmentType = document.getElementById("appointment_type").value;
                if (appointmentType === 'doorstep') {
                    document.getElementById("address_field").style.display = "block";
                    document.getElementById("online_meeting_type_field").style.display = "none";
                    // Clear online meeting type field if it was visible
                    document.getElementById("online_meeting_type").selectedIndex = 0;
                } else if (appointmentType === 'online') {
                    document.getElementById("address_field").style.display = "none";
                    document.getElementById("online_meeting_type_field").style.display = "block";
                } else {
                    document.getElementById("address_field").style.display = "none";
                    document.getElementById("online_meeting_type_field").style.display = "none";
                    // Clear online meeting type field if it was visible
                    document.getElementById("online_meeting_type").selectedIndex = 0;
                }
            }

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
