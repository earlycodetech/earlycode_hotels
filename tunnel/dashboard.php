<?php
    include '../assets/config/dbcon.php';
    include '../assets/includes/headers.php';
    include '../assets/includes/sessions.php';
    auth();
    
?>
<body>
<?php include '../assets/includes/dashboard-nav.php'; ?>


<section class="mt-3">
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
                <input type="datetime-local" name="bookDate" placeholder="" class="form-control mb-3" required>

                <label>Date and Time of Check Out</label>
                <input type="datetime-local" name="checkOut" placeholder="" class="form-control mb-3" required>

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

       <div class="card mx-auto p-3 mt-4 shadow-lg">
         <div class="table-responsive mt-3">
            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Full Name</th>
                  <th scope="col">Booked Room</th>
                  <th scope="col">Volume</th>
                  <th scope="col">Check In</th>
                  <th scope="col">Check Out</th>
                  <th scope="col">Status</th>
                  <th scope="col">...</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 0,2";
                  $query = mysqli_query($connectDB,$sql);
                  while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                  <td><?php echo $row['full_name']; ?></td>
                  <td><?php echo $row['booked_room']; ?></td>
                  <td><?php echo $row['no_of_rooms']; ?></td>
                  <td><?php echo $row['date_booked']; ?></td>
                  <td><?php echo $row['check_out']; ?></td>
                  <td><?php echo $row['booking_status']; ?></td>
                  <td>
                    <a href="" class="btn btn-primary btn-sm">
                      <i class="fas fa-check"></i>
                    </a>
                    <a href="" class="btn btn-secondary btn-sm">
                      <i class="fas fa-eject"></i>
                    </a>
                    <a href="" class="btn btn-warning btn-sm">
                      <i class="fas fa-times"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
         </div>
       </div>
    </div>
   <?php } ?>
</section>




<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>