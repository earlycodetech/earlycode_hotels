<?php
  // require_once('includes/db_connect.php');
  // session_start();


  // if (!isset($_SESSION['amount'])) {
  //   header('Location:index.php'); 
  // }
 // how to set time and date:(add date in the database table and add $DateTime in the mysqli_stmt_bind_param)
  date_default_timezone_set('Africa/Lagos'); //set time zone
  $DateTime = date('h:iA l d/m/y'); //tells the current time and date


  $firstname = "Emmanuel";
  $lastname = "Aisosa";
  $fullname = $firstname.' '.$lastname;
  $amount = "20000";
  $giving = "Offering";
  $email = "emmanuelodobo10@gmail.com";
  $phone = "+2348142237388";
  $tref  = "Hotels".rand(100000,999999).$firstname;

  // function insert_into(){

  //    //insert into database table
  //   $sql = "INSERT INTO give (fullname,amount,giving,phone,date) 
  //   VALUES(?,?,?,?,?)";
  //   $stmt = mysqli_stmt_init($connect);
  //   mysqli_stmt_prepare($stmt,$sql);
  //   mysqli_stmt_bind_param($stmt,'sisss',$fullname,$amount,$giving,$phone,$DateTime);

  //   //if insert was successful
  //   if (mysqli_stmt_execute($stmt)) {
  //   }
  //   else{
  //       echo 'Payment was successful but merchant confirmation failed <br> contant us: 07031110606';
  //   }
  // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="The Church Assemblies of the Believers Church (ABC) is a living Pentecostal church of Jesus Christ. It was revealed to Bishop(Dr.) G.O.Ngene on December 15, 1980..." />
    <meta name="keyword" content="Assemblies of the Believers Church (ABC)" />
    <meta name="author" content="" />
    <title>Proceed to Give | Assemblies of the Believers Church</title>
    <link rel="icon" href="images/abc-logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/variable.css">
    <script src="js/bootstrap.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
</head>
<body class="bg-primary">

  <div class="card" style="width: 18rem;margin:0 auto;margin-top:80px;margin-bottom:30px">
    <div class="card-header">
      <h6>Giving For: <?php echo $giving; ?></h6>
      <h6>Amount: <?php echo '₦'.$amount; ?></h6>
    </div>
    <div class="card-body">
      <p class="card-text" style="text-align: left;">Full name: <?php echo $firstname.' '.$lastname; ?></p>
      <p class="card-text" style="text-align: left;">Email: <?php echo $email; ?></p>
      <p class="card-text" style="text-align: left;">Phone number: <?php echo $phone; ?></p>

      <hr>
      <!-- //// begins flutterwave payment code //// -->
      <small>Pay online with your debit card</small>
      <input type="submit" class="btn-success btn-lg btn-block" style="cursor:pointer;" value="Pay Now" id="submit" />
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
          document.getElementById('submit').addEventListener('click', function () {

          var flw_ref = "", chargeResponse = "", trxref = "FDKHGK"+ Math.random(), API_publicKey = "FLWPUBK_TEST-83af4504f6370dc6576a13be3875e79b-X";

          var amount_ea = <?php echo $amount;?>;
          var email_ea = <?php echo (json_encode($email)); ?>;
          var phone_ea = <?php echo (json_encode($phone)); ?>;
          var ref_ea = <?php echo(json_encode($tref)); ?>;

          getpaidSetup(
            {
              PBFPubKey: API_publicKey,
              customer_email: email_ea,
              amount: amount_ea,
              customer_phone: phone_ea,
              currency: "NGN",
              txref: ref_ea,
              meta: [{metaname:"EA-NG", metavalue: "NG"}],
              onclose:function(response) {
              },
              callback:function(response) {
                txref = response.data.txRef, chargeResponse = response.data.chargeResponseCode;
                if (chargeResponse == "00" || chargeResponse == "0") {
                  //   if payment failed
                  window.location = "forgot?report=failed";
                } else {
                    //when successful
                  window.location = "forgot?report=Success";
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
