<!-- <?php
include 'connection.php';
?> -->

<?php
if(isset($_POST['register'])){
    $err=[];

    if(isset($_POST['name']) && !empty(trim($_POST['name']))){
        $name=trim($_POST['name']);
    }else{
        $err['name']="Enter name";
    }
    if(isset($_POST['email']) && !empty(trim($_POST['email']))){
        $email=$_POST['email'];
    }else{
        $err['email']="Enter email";
    }

    if(isset($_POST['address']) && !empty(trim($_POST['address']))){
        $address=$_POST['address'];
    }else{
        $err['address']="Enter address";
    }
    if(isset($_POST['phone']) && !empty(trim($_POST['phone']))){
        $phone=$_POST['phone'];
    }else{
        $err['phone']="Enter phone";
    }
    if(isset($_POST['dob']) && !empty(trim($_POST['dob']))){
        $dob=$_POST['dob'];
    }else{
        $err['dob']="Enter dob";
    }
    if(isset($_POST['course']) && !empty(trim($_POST['course']))){
        $course=$_POST['course'];
    }else{
        $err['course']="Select Course";
    }
    if(isset($_POST['username']) && !empty(trim($_POST['username']))){
        $username=$_POST['username'];
    }else{
        $err['email']="Enter username";
    }
    if(isset($_POST['password']) && !empty(trim($_POST['password']))){
        $password=md5($_POST['password']);
    }else{
        $err['password']="Enter password";
    }

    if(!isset($_POST['term'])){
        $err['term']="Please accept term & condition";
    }

    if(count($err)==0){
        //Register process

        //

        //require database_connection.php;
        require 'connection.php';
        $code=uniqid();
        $created_at=date('Y-m-d H:i:s');

        $sql="INSERT INTO crud (code,name,email,phone,address,dob,course,username,password,created_at) VALUES
        ('$code','$name','$email','$phone','$address','$dob','$course','$username','$password','$created_at')";
        $connect->query($sql);
        if($connect->affected_rows==1 && $connect->insert_id>0)
        echo "Registration success";
    }
    else{
        echo 'Registration Failed:';
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Operation</title>
    <style type="text/css">
        .error{
            color:red;
        }
        </style>
</head>
<body>
   <form method="post">
    <label for="">Name</label> 
    <input type="text" name="name">
    <span class="error">
        <?php if(isset($err['name'])){
            echo $err['name'];
        }?>
    </span>
    <br>
    <label for="">Email</label>
    <input type="email" name="email">
    <span class="error">
        <?php
        if(isset($err['email'])){
            echo $err['email'];
        }
        ?>
    </span>
    <br>
    <label for="">Phone</label>
    <input type="text" name="phone">
    <span calss="error">
        <?php
        if(isset($err['phone'])){
            echo $err['phone'];
        }
        ?>
    </span>
    <label for="">Address</label>
    <input type="text" name="address">
    <span class="error">
        <?php 
        if(isset($err['address'])){
            echo $err['name'];
        }
        ?>
    </span>
    <br>
    <label for="">DOB</label>
    <input type="date" name="dob">
    <span class="error">
        <?php 
        if(isset($err['dob'])){
            echo $err['dob'];
        }
        ?>
    </span>
    <br>
    <label for="">Course</label>
    <select name="course">
        <option value="">Select Course</option>
        <option >BSC CSIT</option>
        <option >BIT</option>
        <option >BCA</option>
        <option >BIM</option>
    </select>
    <span class="error">
        <?php
        if(isset($err['course'])){
            echo $err['course'];
        }
        ?>
    </span>
    <label for="">UserName</label>
    <input type="text" name="username">
    <span class="error">
        <?php 
        if(isset($err['username'])){
            echo $err['username'];
        }
        ?>
    </span>
    <br>
    <label for="">Password</label>
    <input type="password" name="password">
    <span class="error">
        <?php 
        if(isset($err['password'])){
            echo $err['password'];
        }
        ?>
    </span>
    <br>
    <input type="checkbox" name="term" value="term">I accept Term & Condition
    <br>
    <span class="error">
        <?php
        if(isset($err['term'])){
            echo $err['term'];
        }
        ?>
    </span>
    <br>
    <button type="submit" name="register">Register</button>
</body>
</html>