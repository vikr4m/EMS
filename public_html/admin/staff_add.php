<?php
include "admin_master.php";
include "staff_add_logic.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>staff add</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action ="" method="POST">
<h1 align="center">Add Staff</h1>

<label for="name">Name :</label>
<input type="text" name="name"  size="30" pattern="[A-Z a-z]+" title="Use only alphabets" required><br><br>

<label for="uname">User id :</label>
<input type="text" name="user_id" size="30" pattern="[A-Z a-z0-9]+" title="Use only alphanumeric characters" required><br><br>

<label for="dob">Date of Joining :</label>
<input type="Date"  name="doj" required><br><br>

<label for="email">Email :</label>
<input type="text"  name="email" size="30"  pattern="\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})" title="Use appropirate email-id" required><br><br>

<label for="salary">Salary :</label>
<input type="text" name="salary"  size="30"  pattern="[0-9]+" title="only number"  required><br><br>

<label >Designation :</label>
<select  name="designation" required>
  <option value="branch manager">Branch Manager</option>
  <option value="senior executive">senior executive</option>
</select><br><br>

<label for="uname">Branch :</label>
<select  name="branch" required>
  <option value="anand">Anand</option>
  <option value="ahmedabad">Ahmedabad</option>
  <option value="gandhinagar">Gandhinagar</option>
  <option value="surat">Surat</option>
  <option value="rajkot">Rajkot</option>
  <option value="vadodara">Vadodara</option>
  <option value="mehsana">Mehsana</option>
</select><br><br>

<label for="password">Password :</label>
<input type="text" name="password" size="30"  required><br><br>	

<label for ="phone">Contact : +91</label>
<input type="text" name="contact_no" size="10"  pattern="[0-9]{10}" title="10-digit number only" required><br><br>

<input type="button" style="float: left;"  onclick="location.href = 'staff.php';" value="Back"/>

<input type="submit" name="add_staff" value="Submit">
</form>
</body>
</html>