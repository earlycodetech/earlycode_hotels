<?php
    require "assets/includes/headers.php";
    include "assets/includes/sessions.php";
    include_once 'assets/config/dbcon.php';
?>
<body>
    <?php include_once 'assets/includes/main-nav.php'; ?>

    <div class="container pt-4">
        <?php echo successMessage(); echo errorMessage(); 
        
            if (!isset($_GET['t'])) {
        ?>

        <div class="card mx-auto w-50 p-2 log">
            <img src="assets/img/logo.png" height="50px" width="50px" class="m-3"> Lets get back your passsword!
            <form action="assets/config/forgot_password_control.php" method="post">
                <input type="email" name="email" class="form-control" placeholder="Please Enter Valid Email" required>
                <button type="submit" name="sendT" class="btn btn-primary my-3">Reset</button>
            </form>
        </div>
        <?php }else{ 
                $token = $_GET['t'];
                $sql = "SELECT * FROM users WHERE password_reset = '$token'";
                $query = mysqli_query($connectDB,$sql);
                if (mysqli_num_rows($query) < 1) {
                    $_SESSION['errorMessage'] = "Reset Failed Please Try Again";
                    header('Location:authentication');
                }else{
                    $row = mysqli_fetch_assoc($query);
                    $id = $row['id'];
                }
            
            ?>

            <div class="card mx-auto w-50 p-2 log">
                <img src="assets/img/logo.png" height="50px" width="50px" class="m-3"> Lets get back your passsword!
                <form action="assets/config/forgot_password_control.php" method="post">
                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <input type="password" name="pass" class="form-control" placeholder="New Password" required>
                    <button type="submit" name="resetPass" class="btn btn-primary my-3">Reset</button>
                </form>
            </div>


        <?php } ?>
    </div>

    <style>
        a:hover{
            cursor: pointer;
            font-weight: bold;
            color: yellow;
        }
    </style>
    
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>