<?php
    session_start();

   function successMessage(){
    if (isset($_SESSION['successMessage'])) {
        
        $message = "<div class=\"alert rounded-0 text-center fw-bold alert-success text-success alert-dismissible fade show\" role=\"alert\">";
        $message .= htmlentities($_SESSION['successMessage']);
        $message .= " <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
        $_SESSION['successMessage'] = null;

        return $message;
    }
   }

   function errorMessage(){
    if (isset($_SESSION['errorMessage'])) {
        
        $message = "<div class=\"alert rounded-0 text-center fw-bold alert-danger text-danger alert-dismissible fade show\" role=\"alert\">";
        $message .= htmlentities($_SESSION['errorMessage']);
        $message .= " <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
        $_SESSION['errorMessage'] = null;

        return $message;
    }
   }