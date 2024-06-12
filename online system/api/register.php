<?php

    include("connect.php");
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['name']['photo']; 
    $tmp_name = $_FILES['tmp_name']['photo'];
    $role = $_POST['role'];

    if($password==$cpassword){
        move_uploaded_file($tmp_name, "../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user (Name, Mobile, Password, Photo, Role, Status, Votes) 
        VALUES ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");
        if($insert){
            echo'<script>
            alert("Registration Sucessful");
            window,location = "../";
            </script>
            ';
        }

        else{
            echo'<script>
            alert("RETRY, ERROR OCCURED!!!!");
            window,location = "../routes/register.html";
            </script>
            ';
        }
    }

    else{
        echo'<script>
            alert("Password and Confirm Password doesnt match");
            window,location = "../routes/register.html";
            </script>
            ';
        
    }
?>