<?php
include "db_surat.php";

  
   if(isset($_POST['name']))
    {
              
   $datas =  $_POST['name'];
   
  $table_query = "SELECT * FROM leads where `programme`='$datas' or `source`= '$datas' or `phone` = '$datas' or `name` = '$datas' ORDER BY DATE DESC ";
      $delimiter = ",";
    $filename = "Leads" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'Program', 'DOB', 'Source','Lead By', 'Comments', 'Date');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
     $lineData = array($row['name'], $row['phone'], $row['programme'], $row['dob'], $row['source'], $row['lead_by'], $row['comments'], $row['date']);
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




	 elseif(isset($_GET['name']))
    {
        	    
   $datas =  $_GET['name'];
   
  $table_query = "SELECT * FROM leads where `programme`='$datas' or `source`= '$datas' or `phone` = '$datas' or `name` = '$datas' ORDER BY DATE DESC ";
      $delimiter = ",";
    $filename = "Leads" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'Program', 'DOB', 'Source','Lead By', 'Comments', 'Date');
    fputcsv($f, $fields, $delimiter);

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		 $lineData = array($row['name'], $row['phone'], $row['programme'], $row['dob'], $row['source'], $row['lead_by'], $row['comments'], $row['date']);
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
        	
  $table_query = "SELECT * FROM leads  ORDER BY DATE DESC ";
      $delimiter = ",";
    $filename = "Leads" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Name', 'Contact', 'Program', 'DOB', 'Source','Lead By', 'Comments', 'Date');
    fputcsv($f, $fields, $delimiter);

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		 $lineData = array($row['name'], $row['phone'], $row['programme'], $row['dob'], $row['source'], $row['lead_by'], $row['comments'], $row['date']);
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