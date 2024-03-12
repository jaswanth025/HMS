<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="animations.css">  
    <link rel="stylesheet" href="main.css">  
    <link rel="stylesheet" href="index.css">

    <style>
        .specializations {
            position: absolute;
            top: 0;
            right: 10px;
            color: lightgrey;
            text-decoration: none;
            margin-top: 14px;
        }

    </style>
</head>
<body backgroundimage="b4.jpg">
    <div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td width="80%">
                    <font class="edoc-logo">Apollo Hospitals </font>
                    <font class="edoc-logo-sub">| Saving lives</font>
                </td>
                <td width="12%" style="position: relative;">
                   <a href="doctor_list.php" class="specializations">Doctor Specializations</a>
                </td>
                <td  width="10%">
                    <a href="patient_login.php" class="non-style-link"><p class="nav-item">LOGIN</p></a>
                </td>
                <td  width="10%">
                    <a href="patient_signup.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">REGISTER</p></a>
                </td>
            </tr>
            
            <tr>
                <td  colspan="3">
                    <p class="heading-text">Avoid Hassles & Delays.</p>
                </td>
            </tr>
            <tr>
                <td  colspan="3">
                    <p class="sub-text2">How is your health today? Sounds like not good!<br>Don't worry. Find your doctor online. Book as you wish with Apollo. <br>
                    We offer you a free doctor channeling service. Make your appointment now.</p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <a href="patient_signup.php">
                            <input type="button" value="Make Appointment" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        </a>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <p  style = "color: white; font-size:18px" class="sub-text">If you are a doctor, <a href="doctor_appointments.php">click here</a> to view your appointments.</p>
                    </center>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
