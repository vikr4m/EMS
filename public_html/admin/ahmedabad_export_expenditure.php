<?php
include "db_ahmedabad.php";
  
    {
              
   
  $table_query = "SELECT * from expenditure ORDER BY DATE DESC";
      $delimiter = ",";
    $filename = "Expenditure" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     $fields = array('Type', 'Subtype', 'Date' , 'Bill/Voucher' , 'Description','Entry By' ,'Amount','Mode of Pay','Neft/Cheque_no');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($table_query))
   {

    while ($row = $result->fetch_assoc())
     {
     $lineData = array($row['type'], $row['subtype'],  $row['date'] , $row['bill'], $row['description'], $row['entry_by'], $row['amount'], $row['modeofpay'],$row['neft/cheque_no']);
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