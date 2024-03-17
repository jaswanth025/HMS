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

// Fetch doctor names for dropdown list
$doctorNames = array(
    "Dr. Rajesh Kumar" => "Dr. Rajesh Kumar",
    "Dr. Priya Sharma" => "Dr. Priya Sharma",
    "Dr. Vivek Patel" => "Dr. Vivek Patel",
    "Dr. Anjali Desai" => "Dr. Anjali Desai",
    "Dr. Sanjay Gupta" => "Dr. Sanjay Gupta",
    "Dr. Deepika Singh" => "Dr. Deepika Singh",
    "Dr. Rahul Shah" => "Dr. Rahul Shah",
    "Dr. Pooja Mehta" => "Dr. Pooja Mehta",
    "Dr. Manoj Joshi" => "Dr. Manoj Joshi",
    "Dr. Aarti Sharma" => "Dr. Aarti Sharma"
);

// Handle form submission for feedback
if (isset($_POST['submit_feedback'])) {
    $patientName = $_POST['patient_name'];
    $doctorName = $_POST['doctor_name'];
    $appointmentRating = $_POST['appointment_rating'];
    $checkupRating = $_POST['checkup_rating'];
    $starsRating = $_POST['stars_rating'];
    $waitTimeRating = $_POST['wait_time_rating'];
    $communicationRating = $_POST['communication_rating'];
    $treatmentEffectivenessRating = $_POST['treatment_effectiveness_rating'];
    $feedbackText = $_POST['feedback_text'];

    // Insert feedback into the feedback table
    $insertFeedbackSql = "INSERT INTO feedback (patient_name, doctor_name, appointment_rating, checkup_rating, stars_rating, wait_time_rating, communication_rating, treatment_effectiveness_rating, feedback_text) 
                          VALUES ('$patientName', '$doctorName', $appointmentRating, $checkupRating, $starsRating, $waitTimeRating, $communicationRating, $treatmentEffectivenessRating, '$feedbackText')";
    if ($conn->query($insertFeedbackSql) === TRUE) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error submitting feedback: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Feedback</title>
    <style>
        body {
            background-image: url('b4.jpg'); /* Specify the path to your image */
            background-size: cover;
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: black;
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

        label {
            font-weight: bold;
        }

        select,
        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body >
    <div class="container">
        <h2>Doctor Feedback</h2>
        <form method="post">
        <div class="form-group">
                <label for="patient_name">Patient Name:</label>
                <input type="text" name="patient_name" id="patient_name" required>
            </div>
            
            <div class="form-group">
                <label for="doctor_name">Doctor Name:</label>
                <select name="doctor_name" id="doctor_name">
                    <?php
                    // Loop through doctor names to populate the dropdown list
                    foreach ($doctorNames as $doctor) {
                        echo "<option value=\"$doctor\">$doctor</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="appointment_rating">How was the doctor's appointment?</label>
                <select name="appointment_rating" id="appointment_rating">
                    <option value="1">1 (Poor)</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 (Excellent)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="checkup_rating">How was the check-up experience?</label>
                <select name="checkup_rating" id="checkup_rating">
                    <option value="1">1 (Poor)</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 (Excellent)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="stars_rating">Rate your overall experience (out of 5 stars)</label>
                <input type="number" name="stars_rating" id="stars_rating" min="1" max="5" required>
            </div>
            
            <div class="form-group">
                <label for="wait_time_rating">How was the wait time?</label>
                <select name="wait_time_rating" id="wait_time_rating">
                    <option value="1">1 (Poor)</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 (Excellent)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="communication_rating">How was the communication with the doctor?</label>
                <select name="communication_rating" id="communication_rating">
                    <option value="1">1 (Poor)</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 (Excellent)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="treatment_effectiveness_rating">How effective was the treatment?</label>
                <select name="treatment_effectiveness_rating" id="treatment_effectiveness_rating">
                    <option value="1">1 (Poor)</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 (Excellent)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="feedback_text">Additional Feedback (Optional)</label>
                <textarea name="feedback_text" id="feedback_text"></textarea>
            </div>
            
            <button type="submit" name="submit_feedback" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
