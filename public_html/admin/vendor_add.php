<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
 include "admin_master.php";
 include "genexp_logic.php";
   
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add Vendor</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 <form action ="" method="POST">
  
<h1 align="center">Add Vendor</h1>
 
<label for="name">Vendor Name <span class="error">*</span> :</label>
<input type="text"  name="name" pattern="[A-Z a-z]+" title="Use only alphabets" size="30" required><br><br>
 
<label for="descr">Description <span class="error">*</span> :</label>
<input type="text"  name="descr" size="30" required><br><br>

<label for="contact">Contact no.<span class="error">*</span> : +91 </label>
<input type="text" id="contact" name="contact" pattern="[0-9]{10}" title="10-digit number only" size="10" required><br><br>
<input type="button" style="float: left;"  onclick="location.href = 'genexpdisp.php';" value="Back"/>
<input type="submit" name="add_vendor" value="Submit">

 </body>
 </html>