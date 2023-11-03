<?php
 include "db_login.php";


if (isset($_POST['add_staff'])) {

$name = $_POST['name'];
$uname = $_POST['user_id'];
$doj = $_POST['doj'];
$email  = $_POST['email'];
$salary = $_POST['salary'];
$designation = $_POST['designation'];
$branch = $_POST['branch'];	
$password = $_POST['password'];
$phone = $_POST['contact_no'];

$stmt = "INSERT into login (`name`, `user_id`, `doj` , `email` , `salary` , `designation` ,`branch` , `password`, `contact_no`) VALUES ('$name', '$uname', '$doj' , '$email' , '$salary' , '$designation' ,'$branch' ,'$password','$phone')";

$stmt_result=mysqli_query($con,$stmt);
{
echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
}


}


if (isset($_POST['edit_staff'])) {

$sid = $_REQUEST['sid'];
$name = $_POST['name'];
$uname = $_POST['user_id'];
$doj = $_POST['doj'];
$email  = $_POST['email'];
$salary = $_POST['salary'];
$designation = $_POST['designation'];
$branch = $_POST['branch'];	
$password = $_POST['password'];
$phone = $_POST['contact_no'];


     $update = " UPDATE `login` SET `name` = '$name' , `user_id` = '$uname' , `doj` = '$doj',`email` = '$email' ,  `salary` = '$salary' ,`designation` = '$designation', `branch` = '$branch ',`password`= '$password' ,  `contact_no` = '$phone'  WHERE `sid` = '$sid' ";

$stmt_result=mysqli_query($con,$update);
{
echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
}

}

?>