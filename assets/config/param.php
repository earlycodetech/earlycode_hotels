<?php
    include 'dbcon.php';
    include '../includes/sessions.php';
    if (isset($_GET['check_in'])) {
          $bookId = $_GET['check_in'];
          $date = date('Y-m-d h:i:s');
          $sql = "UPDATE bookings SET booking_status = 'Checked In', date_booked = '$date' WHERE id = '$bookId'";
          $query = mysqli_query($connectDB,$sql);
          if ($query) {
                $_SESSION['successMessage'] = "Checked in successfully";
                header("Location: ../../tunnel/dashboard");
            }else{
                $_SESSION['errorMessage'] = "Checkin Failed";
                header("Location: ../../tunnel/dashboard");
            }
    }

    elseif (isset($_GET['check_out'])) {
        $bookId = $_GET['check_out'];
        $date = date('Y-m-d h:i:s');
        $sql = "UPDATE bookings SET booking_status = 'Checked Out', check_out = '$date' WHERE id = '$bookId'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
              $_SESSION['successMessage'] = "Checked Out successful";
              header("Location: ../../tunnel/dashboard");
          }else{
              $_SESSION['errorMessage'] = "Checkout Failed";
              header("Location: ../../tunnel/dashboard");
          }
  }


  
    // Main ELSE STATEMENT
    else{
        header('Location: ../../tunnel/dashoard');
    }