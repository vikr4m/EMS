<?php
include "db_gandhinagar.php";

  
   if(isset($_POST['programme']))
    {
              
   $course =  $_POST['programme'];
   
  $table_query = "SELECT * from student where `programme` ='$course' ORDER BY sname";
      $delimiter = ",";
    $filename = "Program" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'DOB' , 'Program' , 'Course','Email');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
     $lineData = array($row['name'], $row['wcontact'],  $row['dob'] , $row['programme'], $row['course'], $row['email']);
        fputcsv($f, $lineData, $delimiter);
       
       }
     fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
     
    }

  }
  else
  {
     $course =  $_GET["name"];
   
  $table_query = "SELECT * from student where `programme` ='$course' ORDER BY sname";
      $delimiter = ",";
    $filename = "Program" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'DOB' , 'Program' , 'Course','Email');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
     $lineData = array($row['sname'], $row['wcontact'],  $row['dob'] , $row['programme'], $row['course'], $row['email']);
        fputcsv($f, $lineData, $delimiter);
       
       }
     fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
     
    }

  }
	
?>