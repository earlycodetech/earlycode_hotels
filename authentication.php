<?php
    require "assets/includes/headers.php";
    include "assets/includes/sessions.php";
?>
<body>
    <?php include_once 'assets/includes/main-nav.php'; ?>

    <div class="container pt-4">
        <?php echo successMessage(); echo errorMessage(); ?>
        <div class="card mx-auto w-50 p-2 log">
            <img src="assets/img/logo.png" height="50px" width="50px" class="m-3"> Log In
            <form action="assets/config/login_control.php" method="post">
                <input type="email" name="email" placeholder="Email*"  class="form-control mb-3">
                <input type="password" name="password" placeholder="Password*"  class="form-control mb-2">
                <a href="forgot" class="nav-link text-primary">Forgot Password?</a>
                <a class="nav-link text-dark float-end" onclick="change()">
                   Click here to Register
                </a>

                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>

        <div class="card mx-auto w-75 d-none p-2 reg">
            <img src="assets/img/logo.png" height="50px" width="50px" class="m-3"> Register
            <form action="assets/config/register_control.php" method="post">
                <input type="text" name="fname" placeholder="First Name*"  class="form-control mb-3" required>
                <input type="text" name="lname" placeholder="Last Name*"  class="form-control mb-3" required>
                <input type="text" name="dob" onfocus="(this.type = 'date')"  placeholder="Date of Birth*"  class="form-control mb-3" required>
                <input type="email" name="email" placeholder="Email*"  class="form-control mb-3" required>
                <input type="tel" name="phone" placeholder="Phone Number*"  class="form-control mb-3" required>
                <input type="password" name="password" placeholder="Password*"  class="form-control mb-2" required>
                <input type="password" name="cpass" placeholder="Confirm Password*"  class="form-control mb-2" required>

                <button type="submit" name="register" class="btn btn-primary">Sign Up</button>

                <a class="nav-link text-dark float-end" onclick="change()">
                   Click here to Login
                </a>
            </form>
        </div>
    </div>

    <style>
        a:hover{
            cursor: pointer;
            font-weight: bold;
            color: yellow;
        }
    </style>
    <script>
        function change(){
            document.querySelector('.reg').classList.toggle('d-none');
            document.querySelector('.log').classList.toggle('d-none');
        }
    </script>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>