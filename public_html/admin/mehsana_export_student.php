<?php
include "db_mehsana.php";

  
   if(isset($_POST['name']))
    {
              
   $datas =  $_POST['name'];
   
  $table_query = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname ";
      $delimiter = ",";
    $filename = "Students" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Student Name', 'Guardian Name' , 'DOB', 'Gender', 'Whatsapp Contact', 'Emergency Contact' ,'Program',  'DOJ' , 'Course', 'Duration', 'Email id' , 'Address', 'pincode', 'Total Fees', 'Paid Fees' ,'Remaining Fees');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
     $lineData = array($row['sname'],$row['gname'],  $row['dob'], $row['gender'], $row['wcontact'],  $row['econtact'],$row['programme'], $row['doj'], $row['course'], $row['duration'], $row['email'], $row['cor_address'], $row['pincode'],$row['fee_t'],$row['fee_p'],$row['fee_r'],);
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
   
  $table_query = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname";
      $delimiter = ",";
    $filename = "Students" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
      $fields = array('Student Name', 'Guardian Name' , 'DOB', 'Gender', 'Whatsapp Contact', 'Emergency Contact' ,'Program',  'DOJ' , 'Course', 'Duration', 'Email id' , 'Address', 'pincode', 'Total Fees', 'Paid Fees' ,'Remaining Fees');
      fputcsv($f, $fields, $delimiter);

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		  $lineData = array($row['sname'],$row['gname'],  $row['dob'], $row['gender'], $row['wcontact'],  $row['econtact'],$row['programme'], $row['doj'], $row['course'], $row['duration'], $row['email'], $row['cor_address'], $row['pincode'],$row['fee_t'],$row['fee_p'],$row['fee_r'],);
 
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
        	
  $table_query = "SELECT * FROM student order by sname ";
      $delimiter = ",";
    $filename = "Students" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
       $fields = array('Student Name', 'Guardian Name' , 'DOB', 'Gender', 'Whatsapp Contact', 'Emergency Contact' ,'Program',  'DOJ' , 'Course', 'Duration', 'Email id' , 'Address', 'pincode', 'Total Fees', 'Paid Fees' ,'Remaining Fees');
    fputcsv($f, $fields, $delimiter);

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
	  $lineData = array($row['sname'],$row['gname'],  $row['dob'], $row['gender'], $row['wcontact'],  $row['econtact'],$row['programme'], $row['doj'], $row['course'], $row['duration'], $row['email'], $row['cor_address'], $row['pincode'],$row['fee_t'],$row['fee_p'],$row['fee_r'],);

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