<?php



//collect data from from form
$studentId = 23455;
$firstName = "Emmanuel";
$lastName = "Aisosa";
$email = "emmanuelodobo10@gmail.com";
$phone = "+2348142237388";
$fee = 123456;
$ref = $studentId ."Hotels". rand(100000,999999);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap5.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
        <title>Term Registration Payment | SID</title>
    </head>
    <body>
    <div class="card" style="width: 18rem;margin:0 auto;margin-top:80px;margin-bottom:30px">
          <div class="card-header">
            <h5>Student ID: <?php echo $studentId; ?></h5>
            <h6>Term fee: <?php echo '₦'.$fee; ?></h6>
          </div>
          <div class="card-body">
            <p class="card-text" style="text-align: left;">
                Full name: <?php echo $lastName.' '.$firstName; ?>
            </p>
            <hr>
            <!-- //// begins flutterwave payment code //// -->

              <input type="submit" class="btn-success btn-lg btn-block" style="cursor:pointer;" value="Pay Now" id="submit" />
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
              <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
              <script type="text/javascript">
              document.addEventListener("DOMContentLoaded", function(event) {
                document.getElementById('submit').addEventListener('click', function () {

                var flw_ref = "", chargeResponse = "", trxref = "FDKHGK"+ Math.random(), API_publicKey = "FLWPUBK-344c5b8e49eb13db09fe93cb4cf82ce0-X";
                
                // assign value from PHP variables to
                //JavaScript variables
                var fee = <?php echo $fee;?>;
                var email = <?php echo(json_encode($email)); ?>;
                var phone = <?php echo(json_encode($phone)); ?>;
                var ref = <?php echo(json_encode($trnref)); ?>; //you can form any ref like I did above

                getpaidSetup(
                  {
                    PBFPubKey: API_publicKey,
                    customer_email: email,
                    amount: fee,
                    customer_phone: phone,
                    currency: "NGN",
                    txref: ref,
                    meta: [{metaname:"EA-NG", metavalue: "NG"}],
                    onclose:function(response) {
                    },
                    callback:function(response) {
                      txref = response.data.txRef, chargeResponse = response.data.chargeResponseCode;
                      if (chargeResponse == "00" || chargeResponse == "0") {
                        //   if payment failed, redirect to desired page
                        window.location = "authentication";
                      } else {
                          //   if payment succeed, redirect to desired page
                        window.location = "authentication";
                      }
                    }
                  }
                );
                });
              });
            </script>
          </div><!--end of card body-->
        </div><!--end of card-->
    </body>
</html>