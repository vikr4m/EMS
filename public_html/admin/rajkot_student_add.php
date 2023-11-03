<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}

include "admin_master.php";
include "db_rajkot.php";
include "logic_rajkot.php";	
 ?>
<!DOCTYPE html>
<html>
<head>


  <title>student_add</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form name="registration"  action ="" method="POST">
  
<h1 align="center">Add Student Details</h1>


<label for="sname">Student Name<span class="error">*</span> :</label>
<input type="text"  name="sname" pattern="[A-Z a-z]+" title="Use only alphabets" size="30" required><br><br>

<label for="gname">Guardian Name<span class="error">*</span> :</label>
<input type="text"  name="gname" pattern="[A-Z a-z]+" title="Use only alphabets" size="30" required=""><br><br>  

<label for="email">Email<span class="error">*</span> :</label>
<input type="text" id="email" name="email" pattern="\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})" title="Use appropirate email-id" size="30" required><br><br>  


<label for="dob">Date of Birth :</label>
<input type="Date" id="dob" name="dob" required><br><br>


<label for="gender">Gender :</label>
<input type="radio"  name="gender" value="Male" required>

<label for="male">Male</label>
<input type="radio"  name="gender" value="Female">
<label for="female">Female</label>
<input type="radio"  name="gender" value="Others">
<label for="other">Other</label><br><br>

<label for="wcontact">Phone no.(Whatsapp)<span class="error">*</span> : +91 </label>
<input type="text" id="wcontact" name="wcontact" pattern="[0-9]{10}" title="10-digit number only" size="10" required><br><br>


<label for="econtact">Emergency Contact<span class="error">*</span> : +91 </label>
<input type="text" id="econtact" name="econtact" pattern="[0-9]{10}" title="10-digit number only" size="10" required><br><br>

<div>  
<label for="address">Correspondence Address<span class="error">*</span> :</label>
</div>
<textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>
 
<label for="">PIN code<span class="error">*</span> :</label>
<input type="text" id="pincode" name="pincode" pattern="[0-9]{6}" title="Only 6-digits" size="6" required><br><br>


Programme :
<select name="programme" required>
  <option value =""> --Please select programme--</option>  
  <?php

  $dropdown = add_course();
  // var_dump($dropdown);
  $result = arraytostring($dropdown,$result_string =null);
  // var_dump($result);
  echo $result;

  ?>
</select><br><br>


Duration :  
<select name="duration" required>  
  <option value="">--Please Select duration--</option>
  <option value="1 year">1 year</option>  
  <option value="2 year">2 year</option>  
  <option value="3 year">3 year</option>  
  <option value="unlimited">unlimited</option>    
</select>   <br><br>


Please select your course:<br>  
  <input type="radio"  name="course" value="pt+main+interview">
  <label for="pt+main+interview">PT+Main+Interview</label><br>

  <input type="radio"  name="course" value="prelims" >
  <label for="oprelims">Only Prelims</label><br>

  <input type="radio"  name="course" value="mains" >
  <label for="omains">Only Mains</label><br>

  <input type="radio"  name="course" value="interview" >
  <label for="oprelims">Only Interview</label><br>

  <input type="radio"  name="course" value="ts" >
  <label for="ts">Test Series</label><br>
  
  <input type="radio"  name="course" value="material">
  <label for="material">Only Material</label><br>
 
  <input type="radio"  name="course" value="others">
  <label for="others">Others</label><br>

<br>

<label for="doj">Date of Joining :</label>
<input type="Date" id="doj" name="doj" required><br><br>


<label for="fees_t">Total Fees<span class="error">*</span>:</label>
<input type="text" id="fees_t" name="fees_t" size="30" pattern="[0-9]+" required ><br><br>
<br>

<input type="button" style="float: left;"  onclick="location.href = 'rajkot_student.php';" value="Back"/>

<input type="submit" name="add_student" value="Submit">
</form>



</body>
</html>