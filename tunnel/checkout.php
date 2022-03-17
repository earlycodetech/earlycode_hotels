<?php
    include '../assets/config/dbcon.php';
    include '../assets/includes/headers.php';
    include '../assets/includes/sessions.php';
    auth();
    
?>
<body>
<?php include '../assets/includes/dashboard-nav.php'; ?>


<section class="mt-3">
  <?php      echo successMessage(); echo errorMessage(); ?>

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
           <h1>Bookings</h1>
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
                  $sql = "SELECT * FROM bookings WHERE booking_status = 'Checked Out' ORDER BY id DESC LIMIT 0,2";
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
                    <!-- <a href="../assets/config/param?check_in=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                      <i class="fas fa-check"></i>
                    </a> -->
                    <a href="../assets/config/param?check_out=<?php echo $row['id'] ?>" class="btn btn-secondary btn-sm">
                      <i class="fas fa-eject"></i>
                    </a>
                    <!-- <a href="" class="btn btn-warning btn-sm">
                      <i class="fas fa-times"></i>
                    </a> -->
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
</section>




<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>