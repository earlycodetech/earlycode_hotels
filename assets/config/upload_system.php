<?php
    include 'dbcon.php';
    include '../includes/sessions.php';
    $id = $_SESSION['id'];
    if (!isset($_POST['uploadPic'])) {
        header('Location: ../../tunnel/dashoard');
    }else{
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        // Create File Extension
        $fileExtension = explode('.',$fileName);

        // Retrieve the exploded array at the end
        $fileExtension = end($fileExtension);

        // Convert file extension to lower case
        $fileExtension = strtolower($fileExtension);

        // Files that will be allowed by the system
        $allowedFiles = array('jpg','png','jpeg');

        // Check if filetype is allowed
        if (in_array($fileExtension,$allowedFiles)) {
            // Check if file has an error
            if ($fileError < 1) {
                // Check the file size
                if ($fileSize < 5000000) {
                    // File final destination
                    $location = "../img/prof_pic/";
                    
                    // Builed file actual name
                   $fileNewName = "profile".$id.".".$fileExtension;

                // Move file to new location
                   $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                   if ($move) {
                    // Check if file already exists
                        if (file_exists($fileNewName)) {
                            unlink($fileNewName);
                            $sql = "UPDATE users SET user_pic = '$fileNewName' WHERE id = '$id'";
                            $query = mysqli_query($connectDB,$sql);
                            if ($query) {
                                $_SESSION['successMessage'] = "Image upload successfull";
                                header("Location: ../../tunnel/dashboard");
                              }else{
                                $_SESSION['errorMessage'] = "Something went wrong";
                                header("Location: ../../tunnel/dashboard");
                            }  
                        }else{
                            $sql = "UPDATE users SET user_pic = '$fileNewName' WHERE id = '$id'";
                            $query = mysqli_query($connectDB,$sql);
                            if ($query) {
                                $_SESSION['successMessage'] = "Image upload successfull";
                                header("Location: ../../tunnel/dashboard");
                              }else{
                                $_SESSION['errorMessage'] = "Something went wrong";
                                header("Location: ../../tunnel/dashboard");
                            }  
                        }
                   }else{
                    $_SESSION['errorMessage'] = "Upload Failed";
                    header("Location: ../../tunnel/dashboard");
                   }
                }else{
                    $_SESSION['errorMessage'] = "File is too large, resize to 5mb or less";
                    header("Location: ../../tunnel/dashboard");
                }
            }else{
                $_SESSION['errorMessage'] = "File is corrupted, please upload a new file";
                header("Location: ../../tunnel/dashboard");
            }
        }else{
            $_SESSION['errorMessage'] = "File type not supported, please upload jpg, png or jpeg files";
            header("Location: ../../tunnel/dashboard"); 
        }

        print_r($file);
    }