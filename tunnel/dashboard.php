<?php
    include '../assets/config/dbcon.php';
    include '../assets/includes/headers.php';
    include '../assets/includes/sessions.php';
    auth();
    
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-uppercase fw-bold" href="index">
        <img src="../assets/img/logo.png" alt="" height="50px"> Early Code Hotels
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="../assets/config/logout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<section>
  <?php if($_SESSION['role'] != 'admin'){
      echo successMessage(); echo errorMessage();
    ?>
      <div class="container">
          <div class="card p-2 mx-auto shadow" style="max-width: 600px;">
              <form action="../assets/config/insert_control.php" method="post">

              <select name="roomType" class="form-select mb-3" required>
                <option disabled selected>Select a Room</option>
                <?php 
                // Select All Data From  The table of rooms
                  $sql = "SELECT * FROM rooms"; 
                  $query = mysqli_query($connectDB,$sql);
                  // Use a loop to fetch and echo data repetitively
                  while ($row = mysqli_fetch_assoc($query)) {
                ?>

                <!-- Number Format (4 parameters, number,amount of decimals, decimal seperator,thousands seperator ) -->
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['room_name']." ₦".number_format($row['price'],2,'.',','); ?></option>
                <?php } ?>
              </select>
                <input type="number" name="numRoom" placeholder="Number of Rooms" class="form-control mb-3" required>
                <label>Date and Time of Check In</label>
                <input type="datetime-local" name="checkinTime" placeholder="" class="form-control mb-3" required>

                <button type="submit" name="book" class="btn btn-primary">Book</button>
              </form>
          </div>
      </div>
    <?php }else { 
          echo successMessage(); echo errorMessage();
      ?>

      <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="container">
       <div class="d-flex justify-content-between">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Rooms
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Room</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="../assets/config/insert_control.php" method="post">
                  <input type="text" name="roomName" placeholder="Room Name" class="form-control mb-3">
                  <input type="number" name="numRoom" placeholder="Availablilty" class="form-control mb-3">
                  <input type="number" name="price" placeholder="Room Price" class="form-control mb-3">

                  <button type="submit" name="save" class="btn btn-primary">Save</button>
                </form>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
   <?php } ?>
</section>




<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>