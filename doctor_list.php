<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <link rel="stylesheet" href="animations.css">  
    <link rel="stylesheet" href="main.css">  
    <link rel="stylesheet" href="index.css">
    <style>
        body {
            background-image: url('b4.jpg');
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
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
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #fff;
        }
        th {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }
        td {
            background-color: #333;
        }
        tr:nth-child(even) td {
            background-color: #444;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Doctor List</h2>

    <table>
        <tr>
            <th>Specialization</th>
            <th>Doctor Name</th>
        </tr>
        <tr>
            <td>Allergy and immunology</td>
            <td>Dr. Rajesh Kumar</td>
        </tr>
        <tr>
            <td>Anesthesiology</td>
            <td>Dr. Priya Sharma</td>
        </tr>
        <tr>
            <td>Diagnostic radiology</td>
            <td>Dr. Vivek Patel</td>
        </tr>
        <tr>
            <td>Cardiovascular disease</td>
            <td>Dr. Anjali Desai</td>
        </tr>
        <tr>
            <td>Neurology</td>
            <td>Dr. Sanjay Gupta</td>
        </tr>
        <tr>
            <td>Pediatrics</td>
            <td>Dr. Rahul Shah</td>
        </tr>
        <tr>
            <td>Urology</td>
            <td>Dr. Pooja Mehta</td>
        </tr>
        <tr>
            <td>Ophthalmology</td>
            <td>Dr. Manoj Joshi</td>
        </tr>
        <tr>
            <td>Gynaecology & Obstetrics</td>
            <td>Dr. Aarti Sharma</td>
        </tr>
    </table>
</div>

</body>
</html>
