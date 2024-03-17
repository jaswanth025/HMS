<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="animations.css">  
    <link rel="stylesheet" href="main.css">  
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body{
            background-image: url(bg.jpg);
            background-size: cover;
            height: 100%;
        }

        html, body {
            height: 100%;
            margin: 0;
        }
        
        .full-height {
            background: rgba(26, 26, 26, 0.45);
            background-attachment: fixed;
            max-height: 100vh;
            height: 100vh;


        }
        table{
            width: 100%;
            padding-top: 5px;
            
        }
        .heading-text{
            color: white;
            font-size: 42px;
            font-weight: 700;
            line-height: 63px;
            margin-top: 15%;
        }

        .sub-text2{
            color: rgba(255, 255, 255,0.9);
            font-size: 17px;
            line-height: 27px;
            font-weight: 400;
            text-align: center;
            margin-top: 0;
        }


        .register-btn{
            background-color:  rgba(255, 255, 255,0.9);
            color: #345cc4;
        }


        .edoc-logo{
            color: white;
            font-weight: bolder;
            font-size: 20px;
            padding-left: 20px;
            animation: transitionIn-Y-over 0.5s;
        }

        .edoc-logo-sub{
            color: rgba(255, 255, 255,0.9);
            font-size: 12px;

        }


        .nav-item{
            color:  rgba(255, 255, 255,0.9);
            text-align: center;
            font-size: 15px;
            font-weight: 500;
            animation: transitionIn-Y-over 0.5s;
        }

        .nav-item:hover{
            color: #f0f0f0;

        }

        .footer-hashen{
            position: absolute;
            bottom: 0;
            left: 45%;
            font-size: 13px;
            animation: transitionIn-Y-over 0.5s;
        }

        .specializations {
            position: absolute;
            top: 0;
            right: 10px;
            color: lightgrey;
            text-decoration: none;
            margin-top: 14px;
        }

        .call-us {
            position: relative;
            color: lightgrey;
            text-decoration: none;
            margin-top: 0px
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
            right: 0; 
            top: 100%; 
        }

        .call-us:hover .dropdown-content {
            display: block;
        }

        .space{
            margin-left: 200px;
        }
    </style>
</head>
<body backgroundimage="b4.jpg">
    <div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td >
                    <img src="./logo-w.png" style ="margin-left:50px;"></img>
                </td>
                <td width="10%" style="position: relative;">
                    <div class="call-us" style="margin-left:0px">
                        Emergency <i class="fas fa-phone"></i>
                        <div class="dropdown-content" style="color:black;">
                            phno: +918106336722
                        </div>
                    </div>
                </td>
                <td width="8%" style="position: relative;">
                    <div class="call-us" style="marign-left:0px">
                        Call Us <i class="fas fa-phone" ></i>
                        <div class="dropdown-content" style="color:black;">
                            doctor appointments : +917993798984<br>
                            quiries : +918465851019
                        </div>
                    </div>
                </td>
                <td width="5%" style="position: relative;" >
                   <a href="feedback_form.php" class="specializations" style="margin-right:10px;margin-top:30px;">Feedback</a>
                </td>
                <td width="12%" style="position: relative;" >
                   <a href="doctor_list.php" class="specializations" style="margin-right:8px; margin-top:30px;">Doctor Specializations</a>
                </td>
                <td  width="8%">
                    <a href="patient_login.php" class="non-style-link"><p class="nav-item">LOGIN</p></a>
                </td>
                <td  width="10%">
                    <a href="patient_signup.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">REGISTER</p></a>
                </td>
            </tr>
            
            <tr>
                <td  colspan="5" >
                    <p class="heading-text space" style='margin-left : 540px '>Avoid Hassles & Delays.</p>
                </td>
            </tr>
            <tr>
                <td  colspan="5" >
                    <p class="sub-text2 space" >How is your health today? Sounds like not good!<br>Don't worry. Find your doctor online. Book as you wish with Apollo. <br>
                    We offer you a free doctor channeling service. Make your appointment now.</p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <center>
                        <a href="patient_signup.php">
                            <input type="button" value="Make Appointment" class="space login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        </a>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="space">
                    <center>
                        <p  style = "color: white; font-size:18px" class="sub-text space">If you are a doctor, <a href="doctor_appointments.php">click here</a> to view your appointments.</p>
                    </center>
                </td>
            </tr>
        </table>
        <footer style="background-color: #333; color: #fff; text-align: center; padding: 10px;margin-top:108px">
        © 2024 Apollo Hospitals Enterprise Ltd, All Rights Reserved
    </footer>
    </div>
</body>
</html>
