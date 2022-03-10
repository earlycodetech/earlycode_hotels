<?php
    include 'dbcon.php';
    include '../includes/sessions.php';

    $id = $_SESSION['id'];

    if(isset($_POST['save'])){
        $roomName = $_POST['roomName'];
        $avail = $_POST['numRoom'];
        $price = $_POST['price'];
        $date = date('Y-m-d');

        // Prepare Statement
        $sql = "INSERT INTO rooms(room_name,room_stock,price,date_created) VALUES(?,?,?,?)";
        // Initilise Connection to database
        $stmt = mysqli_stmt_init($connectDB);
        // Prepare the statemt 
        mysqli_stmt_prepare($stmt,$sql);
        // Bind parameters
        mysqli_stmt_bind_param($stmt,'ssss',$roomName,$avail,$price,$date);

        // Execute the statement
        $execute = mysqli_stmt_execute($stmt);
        if ($execute) {
            $_SESSION['successMessage'] = "Room Added Successfully";
            header("Location: ../../tunnel/dashboard");
        }else{
            $_SESSION['errorMessage'] = "Something went wrong..";
           header("Location: ../../tunnel/dashboard");
        }

    }
    elseif(isset($_POST['book'])){
      $roomId = $_POST['roomType'];
      $numRoom = $_POST['numRoom'];
      $checkIn = $_POST['checkinTime'];

      $sql = "SELECT * FROM rooms WHERE id= '$roomId'";
      $query =  mysqli_query($connectDB,$sql);
      $row = mysqli_fetch_assoc($query);
      $roomstock = $row['room_stock'];

    //   if number of rooms available is less than number of room required
      if ($numRoom > $roomstock) {
        $_SESSION['errorMessage'] = "Sorry we only have $roomstock rooms available";
        header("Location: ../../tunnel/dashboard");
      }
      else{
          
      }
    }




    // Main ELSE STATEMENT
    else{
        header('Location: ../../tunnel/dashoard');
    }