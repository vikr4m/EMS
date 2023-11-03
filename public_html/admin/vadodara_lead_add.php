<?php
    error_reporting(E_ERROR | E_PARSE);

  session_start();
  if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
  include "admin_master.php";
  include "logic_vadodara.php";	

?>

<!DOCTYPE html>
<html>
<head>
  
  <title>lead_add</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form name="registration"  action ="vadodara_lead_add.php" method="POST">
<h1 align="center">Add Lead</h1>

<label for="name">Name <span class="error">*</span>:</label>
<input type="text"  name="name" pattern="[A-Z a-z]+" title="Use only alphabets" size="30" required><br><br>

<label for="wmobile">Phone no (Whatsapp) <span class="error">*</span>: +91 </label>
<input type="text"  name="wmobile" pattern="[0-9]{10}" title="10-digit number only" size="10" required ><br><br>


<label for="email">Email <span class="error">*</span>:</label>
<input type="text" id="email" name="email"  pattern="\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})" title="Use appropirate email-id" size="30" required ><br><br>  


<label for="dob">D.O.B <span class="error">*</span>:</label>
<input type="date"  name="dob" required><br><br>

Programme <span class="error">*</span>:
<select name="programme" required>
  <option value =""> --Please select programme--</option>  
  <?php

  $dropdown = add_course();
  //var_dump($dropdown);
  $result = arraytostring($dropdown,$result_string =null);
  //var_dump($result);
  echo $result;

  ?>
</select><br><br>

Please select your course <span class="error">*</span>:<br>  
  <input type="radio"  name="course" value="pt+main+interview" >
  <label for="pt+main+interview">PT+Main+Interview</label><br>

  <input type="radio"  name="course" value="prelims">
  <label for="prelims">Only Prelims</label><br>

  <input type="radio"  name="course" value="mains">
  <label for="mains">Only Mains</label><br>

  <input type="radio"  name="course" value="interview">
  <label for="prelims">Only Interview</label><br>

  <input type="radio"  name="course" value="ts">
  <label for="ts">Test Series</label><br>

<input type="radio"  name="course" value="material">
  <label for="material">Only material</label><br>

  <input type="radio"  name="course" value="others">
  <label for="others">Others</label><br>

<br>
<br>

<label for="source">Source <span class="error">*</span>:</label>
  <select id="source" name="source">
  <option value="newspaper">Newspaper</option>
  <option value="google">Google</option>
  <option value="FB/Insta">Facebook/Instgram</option>
  <option value="leaflet">Leaflet</option>
  <option value="Banner">Banner</option>
  <option value="Friends">Friends</option>
  <option value="seminar">Seminar</option>
  <option value="Others">Other</option>
</select>

<br><br>

<label for="comment">Comment <span class="error">*</span>:</label>
<input type="text"  name="comments" required><br><br>

<label for="doi">Date <span class="error">*</span>:</label>
<input type="date"  name="doi" required><br><br><br><br>

<input type="button" style="float: left;"  onclick="location.href = 'vadodara_lead.php';" value="Back"/>

<input type="submit" name="add_lead" value="Submit">
</form>

</body>
</html>
