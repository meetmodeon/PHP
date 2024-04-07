<?php
$stu_id=$_POST['sid'];
$stu_name=$_POST['sname'];
$stu_address=$_POST['saddress'];
$stu_class=$_POST['sclass'];
$stu_phone=$_POST['sphone'];

include 'confing.php';
$sql="UPDATE student SET sname='{$stu_name}',saddress='{$stu_address}',sclass='{$stu_class}',sphone='{$stu_phone}' WHERE sid={$stu_id}";
$result=mysqli_query($conn,$sql) or die("Query Unsuccessful");

header("Location: http//localhost/PHP/phpVideo/index.php");

mysqli_close($conn);


?>