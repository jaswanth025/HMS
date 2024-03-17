<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('b4.jpg');
            background-size: contain;
            color: white;
            font-family: Arial, sans-serif;
        }
        .custom-card {
            border: 1px solid #ccc; 
            border-radius: 10px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
            background-color:  rgb(255, 255, 245); 
            padding: 20px;
            margin-top:300px;
            position: relative; 
            text-align: center; 
        }
        .card-title {
            color: #333; 
        }
        .card-text {
            color: #666; 
        }
        .card-img-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 90%;
            margin-left:20px;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
        }
        .row{
            display:flex;
            justify-content:center;
            align-items:center;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center align-items-center" >
        <div class="col-md-4">
        <img class="card-img-top" src="normal.jpg" alt="Image 1">
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
        <img class="card-img-top" src="online.jpg" alt="Image 2">
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
        <img class="card-img-top" src="door.jpg" alt="Image 3">
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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
