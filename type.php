<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Card Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #007bff; /* Blue background */
        }
        .custom-card {
            border: 1px solid #ccc; /* Add a border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
            background-color: #fff; /* White background */
            padding: 20px;
            margin-bottom: 20px;
        }
        .card-title {
            color: #333; /* Dark text color */
        }
        .card-text {
            color: #666; /* Gray text color */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="custom-card">
                <h5 class="card-title">Appointment Type: Normal</h5>
                <p class="card-text">Schedule your appointment for in-person consultation.</p>
                <form action="normal_appointment.php" method="post">
                    <input type="hidden" name="type" value="normal">
                    <button type="submit" class="btn btn-primary">Schedule Now</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
                <h5 class="card-title">Appointment Type: Online</h5>
                <p class="card-text">Schedule your appointment for online consultation.</p>
                <form action="online_appointment.php" method="post">
                    <input type="hidden" name="type" value="online">
                    <button type="submit" class="btn btn-primary">Schedule Now</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
                <h5 class="card-title">Appointment Type: Door Step</h5>
                <p class="card-text">Schedule your appointment for doorstep consultation.</p>
                <form action="doorstep_appointment.php" method="post">
                    <input type="hidden" name="type" value="doorstep">
                    <button type="submit" class="btn btn-primary">Schedule Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
