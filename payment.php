<?php
session_start();

$email = $_GET['email'];
$name = $_GET['name'];
$doctor = $_GET['doctor'];
$disease = $_GET['disease'];
$slot = $_GET['slot'];
$online_meeting_type = $_GET['online_meeting_type'];

?>


<!DOCTYPE html>
<html>
<head>
<title>How to Integrate Razorpay payment gateway in PHP | tutorialswebsite.com</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    h1{
        text-align:center;
    }
</style>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body style="background-repeat: no-repeat;">
<div class="container">
<div class="row">
    <H1>PAYMENT</H1>
<div class="col-xs-12 col-md-8" style="margin-top:0px; margin-left:190px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Charge Rs.300 INR  </h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="billing_name" id="billing_name" placeholder="Enter name" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="Enter email" required="">
                        </div>
                        
                  <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="billing_mobile" id="billing_mobile" min-length="10" max-length="10" placeholder="Enter Mobile Number" required="" autofocus="">
                        </div>
                        
                         <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="payAmount" id="payAmount" value="300" placeholder="Enter Amount" required="" autofocus="" readonly>
                        </div>
						
	<!-- submit button -->
	<button  id="PayNow" class="btn btn-success btn-lg btn-block" style="border-radius:30px;">Submit & Pay</button>
                       
                    </div>
                </div>
            </div>
</div>
</div>
<script>

    jQuery(document).ready(function($){
 
jQuery('#PayNow').click(function(e){
 
	var paymentOption='';
let billing_name = $('#billing_name').val();
	let billing_mobile = $('#billing_mobile').val();
	let billing_email = $('#billing_email').val();
  var shipping_name = $('#billing_name').val();
	var shipping_mobile = $('#billing_mobile').val();
	var shipping_email = $('#billing_email').val();
var paymentOption= "netbanking";
var payAmount = $('#payAmount').val();
			
var request_url="submitpayment.php";
		var formData = {
			billing_name:billing_name,
			billing_mobile:billing_mobile,
			billing_email:billing_email,
			shipping_name:shipping_name,
			shipping_mobile:shipping_mobile,
			shipping_email:shipping_email,
			paymentOption:paymentOption,
			payAmount:payAmount,
			action:'payOrder'
		}
		
		$.ajax({
			type: 'POST',
			url:request_url,
			data:formData,
			dataType: 'json',
			encode:true,
		}).done(function(data){
		
		if(data.res=='success'){
				var orderID=data.order_number;
				var orderNumber=data.order_number;
				var options = {
    "key": data.razorpay_key, // Enter the Key ID generated from the Dashboard
    "amount": data.userData.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Apollo Hospital", //your business name
    "description": data.userData.description,
    "image": "./logo-w.png",
    "order_id": data.userData.rpay_order_id, //This is a sample Order ID. Pass 
    "handler": function (response){
        // Handle payment success
        window.location.href = "email.php?email=<?php echo urlencode($email); ?>&name=" + encodeURIComponent(billing_name) + "&doctor=" + encodeURIComponent("<?php echo $doctor; ?>") + "&disease=" + encodeURIComponent("<?php echo $disease; ?>") + "&slot=" + encodeURIComponent("<?php echo $slot; ?>") + "&online_meeting_type=" + encodeURIComponent("<?php echo $online_meeting_type; ?>") + "&rp_payment_id=" + response.razorpay_payment_id + "&oid=" + orderID + "&rp_signature=" + response.razorpay_signature;
    },
    "modal": {
    "ondismiss": function(){
         // Handle payment failure
         window.location.href = "payment-failed.php?reason=Payment was cancelled or failed";
     }
},
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": data.userData.name, //your customer's name
        "email": data.userData.email,
        "contact": data.userData.mobile //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Tutorialswebsite"
    },
    "config": {
    "display": {
      "blocks": {
        "banks": {
          "name": 'Pay using '+paymentOption,
          "instruments": [
           
            {
                "method": paymentOption
            },
            ],
        },
      },
      "sequence": ['block.banks'],
      "preferences": {
        "show_default_blocks": true,
      },
    },
  },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
 
    window.location.replace("/bh/medical-consultancy/payment-failed.php?oid="+orderID+"&reason="+response.error.description+"&paymentid="+response.error.metadata.payment_id);
 
         });
      rzp1.open();
     e.preventDefault(); 
}
 
});
 });
    });
</script>
 
</body>
</html>
