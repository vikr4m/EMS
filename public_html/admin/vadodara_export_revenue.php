<?php
include "db_vadodara.php";

  
   if(isset($_POST['programme']))
    {
              
   $course =  $_POST['programme'];
   
  $table_query = "SELECT * from student where `programme` ='$course' ORDER BY sname";
      $delimiter = ",";
    $filename = "Revenue" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'Program', 'Total Fees' , 'Fees Paid' , 'Fees Remaining');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
    $lineData = array($row['sname'], $row['wcontact'], $row['programme'], $row['fee_t'] , $row['fee_p'], $row['fee_r']);
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


  elseif(isset($_GET["course"]))
  {
     $course =  $_GET["course"];
   
  $table_query = "SELECT * from student where `programme` ='$course' ORDER BY sname";
      $delimiter = ",";
    $filename = "Revenue" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'Program', 'Total Fees' , 'Fees Paid' , 'Fees Remaining');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
    $lineData = array($row['sname'], $row['wcontact'], $row['programme'], $row['fee_t'] , $row['fee_p'], $row['fee_r']);
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
     
   
  $table_query = "SELECT * from student  ORDER BY sname";
      $delimiter = ",";
    $filename = "Revenue" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'Program', 'Total Fees' , 'Fees Paid' , 'Fees Remaining');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
     $lineData = array($row['sname'], $row['wcontact'], $row['programme'], $row['fee_t'] , $row['fee_p'], $row['fee_r']);
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