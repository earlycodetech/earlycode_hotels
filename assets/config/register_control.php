<?php
    include 'dbcon.php';
    include '../includes/sessions.php';


    if (!isset($_POST['register'])) {
        $_SESSION['successMessage'] = "Please Register an Account";
        header("Location: ../../authentication");
    }else{
        
    }