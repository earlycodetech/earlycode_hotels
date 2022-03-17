<?php
    include 'dbcon.php';
    include '../includes/sessions.php';

     //set time zone
     date_default_timezone_set('Africa/Lagos');
    if (isset($_GET['check_in'])) {
          $bookId = $_GET['check_in'];
          $date = date('Y-m-d g:i:s');
          $sql = "UPDATE bookings SET booking_status = 'Checked In', date_booked = '$date' WHERE id = '$bookId'";
          $query = mysqli_query($connectDB,$sql);
          if ($query) {
                $_SESSION['successMessage'] = "Checked in successfully";
                header("Location: ../../tunnel/checkin");
            }else{
                $_SESSION['errorMessage'] = "Checkin Failed";
                header("Location: ../../tunnel/checkin");
            }
    }

    elseif (isset($_GET['check_out'])) {
        $bookId = $_GET['check_out'];
        $roomsBooked = $_GET['rooms'];
        $roomName = $_GET['room_name'];
        $sql = "SELECT * FROM rooms WHERE room_name = '$roomName'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
        $availableRooms = $row['room_stock'];

        $newStock = $availableRooms + $roomsBooked;
        $date = date('Y-m-d h:i:s');
        $sql = "UPDATE bookings SET booking_status = 'Checked Out', check_out = '$date' WHERE id = '$bookId'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
            $sql = "UPDATE rooms SET room_stock = '$newStock' WHERE room_name = '$roomName'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $_SESSION['successMessage'] = "Checked Out successful";
                header("Location: ../../tunnel/checkout");
            }else{
              $_SESSION['errorMessage'] = "Checkout Failed";
              header("Location: ../../tunnel/checkout");
            }
              
          }else{
              $_SESSION['errorMessage'] = "Booking Checkout Failed";
              header("Location: ../../tunnel/checkout");
          }
  }
  elseif (isset($_GET['cancel'])) {
    $bookId = $_GET['cancel'];
    $roomsBooked = $_GET['rooms'];
    $roomName = $_GET['room_name'];
    $sql = "SELECT * FROM rooms WHERE room_name = '$roomName'";
    $query = mysqli_query($connectDB,$sql);
    $row = mysqli_fetch_assoc($query);
    $availableRooms = $row['room_stock'];

    $newStock = $availableRooms + $roomsBooked;
    $date = date('Y-m-d h:i:s');
    $sql = "UPDATE bookings SET booking_status = 'Canceled', check_out = '$date' WHERE id = '$bookId'";
    $query = mysqli_query($connectDB,$sql);
    if ($query) {
        $sql = "UPDATE rooms SET room_stock = '$newStock' WHERE room_name = '$roomName'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
            $_SESSION['successMessage'] = "Booking canceled successfully";
            header("Location: ../../tunnel/canceled");
        }else{
          $_SESSION['errorMessage'] = "Cancel Failed";
          header("Location: ../../tunnel/canceled");
        }
          
      }else{
          $_SESSION['errorMessage'] = "Booking Cancel Failed";
          header("Location: ../../tunnel/canceled");
      }
}

elseif (isset($_GET['delete'])) {
    $bookId = $_GET['delete'];
    $roomsBooked = $_GET['rooms'];
    $roomName = $_GET['room_name'];
    $sql = "SELECT * FROM rooms WHERE room_name = '$roomName'";
    $query = mysqli_query($connectDB,$sql);
    $row = mysqli_fetch_assoc($query);
    $availableRooms = $row['room_stock'];

    $newStock = $availableRooms + $roomsBooked;
    $date = date('Y-m-d h:i:s');
    $sql = "DELETE FROM bookings WHERE id = '$bookId'";
    $query = mysqli_query($connectDB,$sql);
    if ($query) {
        $sql = "UPDATE rooms SET room_stock = '$newStock' WHERE room_name = '$roomName'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
            $_SESSION['successMessage'] = "Booking deleted successfully";
            header("Location: ../../tunnel/canceled");
        }else{
          $_SESSION['errorMessage'] = "delete Failed";
          header("Location: ../../tunnel/canceled");
        }
          
      }else{
          $_SESSION['errorMessage'] = "Booking delete Failed";
          header("Location: ../../tunnel/canceled");
      }
}

  
    // Main ELSE STATEMENT
    else{
        header('Location: ../../tunnel/dashoard');
    }