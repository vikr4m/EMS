<?php
include "db_inventory.php";

  
    if(isset($_POST['program']))
    {
              
   $datas =  $_POST['program'];
   
  $table_query = "SELECT * from anand WHERE `program`= '$datas' ";
      $delimiter = ",";
    $filename = "Inventory" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
       $fields = array('Book id', 'Book Name', 'Available', 'Given', 'Program');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
      $lineData = array($row['abook_id'], $row['book_name'], $row['available'], $row['given'], $row['program']);
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
   
  $table_query = "SELECT * FROM anand where `program`='$datas'";
      $delimiter = ",";
    $filename = "Inventory" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Book id', 'Book Name', 'Available', 'Given', 'Program');
    fputcsv($f, $fields, $delimiter);

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		 $lineData = array($row['abook_id'], $row['book_name'], $row['available'], $row['given'], $row['program']);
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
        	
  $table_query = "SELECT * FROM anand";
      $delimiter = ",";
    $filename = "Inventory" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
        $fields = array('Book id', 'Book Name', 'Available', 'Given', 'Program');
    fputcsv($f, $fields, $delimiter);

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		 $lineData = array($row['abook_id'], $row['book_name'], $row['available'], $row['given'], $row['program']);
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