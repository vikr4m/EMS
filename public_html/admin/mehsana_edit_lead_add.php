<?php
error_reporting(E_ERROR | E_PARSE);
  session_start();
  if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}

include "admin_master.php";
include "db_mehsana.php";
include "logic_mehsana.php";

?>

<!DOCTYPE html>
<html>
<head>
  
  <title>lead_edit</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
$edit_lead_form = edit_lead_form();
foreach ($edit_lead_form as $value ) 
{
  ?>


<form   action ="" method="POST">
<h1 align="center">Edit Lead</h1>

<label for="name">Name <span class="error">*</span>:</label>
<input type="text"  name="name" value="<?php echo $value['name']; ?>" pattern="[A-Z a-z]+" title="Use only alphabets" size="30" required><br><br>

<label for="wmobile">Phone no (Whatsapp) <span class="error">*</span>: +91 </label>
<input type="text"  name="wmobile" value="<?php echo $value['wcontact']; ?>" pattern="[0-9]{10}" title="10-digit number only" size="10" required ><br><br>


<label for="email">Email <span class="error">*</span>:</label>
<input type="text" id="email" name="email" value="<?php echo $value['email']; ?>" pattern="\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})" title="Use appropirate email-id" size="30" required ><br><br>  


<label for="dob">D.O.B <span class="error">*</span>:</label>
<input type="date"  name="dob" value="<?php echo $value['dob']; ?>" required><br><br>

Programme : <span class="error">*</span>
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
  <input type="radio"  name="course" value="pt+main+interview" <?php if($value['course']=="pt+main+interview"){ echo "checked";}?>>
  <label for="pt+main+interview">PT+Main+Interview</label><br>

  <input type="radio"  name="course" value="prelims" <?php if($value['course']=="prelims"){ echo "checked";}?>>
  <label for="prelims">Only Prelims</label><br>

  <input type="radio"  name="course" value="mains" <?php if($value['course']=="mains"){ echo "checked";}?>>
  <label for="mains">Only Mains</label><br>

  <input type="radio"  name="course" value="interview" <?php if($value['course']=="interview"){ echo "checked";}?>>
  <label for="prelims">Only Interview</label><br>

  <input type="radio"  name="course" value="ts" <?php if($value['course']=="ts"){ echo "checked";}?>>
  <label for="ts">Test Series</label><br>
  
  <input type="radio"  name="course" value="material" <?php if($value['course']=="material"){ echo "checked";}?>>
  <label for="material">Only Material</label><br>
 
  <input type="radio"  name="course" value="others" <?php if($value['course']=="others"){ echo "checked";}?>>
  <label for="others">Others</label><br>

<br>
<br>


 Source: <span class="error">*</span>  
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

<br>
<br>

<label for="comment">Comment <span class="error">*</span>:</label>
<input type="text"  name="comments" value="<?php echo $value['comments']; ?>" required><br><br>
<label for="doi">Date <span class="error">*</span>:</label>
<input type="date"  name="doi" value="<?php echo $value['date']; ?>"  required><br><br><br><br>

<input type="button" style="float: left;"  onclick="location.href = 'mehsana_lead.php';" value="Back"/>

<input type="submit" name="edit_add_lead" value="Submit">
</form>
<?php
}
?>
</body>
</html>

