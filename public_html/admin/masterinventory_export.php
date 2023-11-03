<?php
include "db_inventory.php";

if(isset($_GET['name']))
{
   $program =  $_GET['name'];
   
 $stmt ="SELECT anand.* , ahmedabad.* , gandhinagar.* , mehsana.* , rajkot.* , surat.* , vadodara.* FROM `anand`,`ahmedabad`,`gandhinagar`,`mehsana`,`rajkot`,`surat`,`vadodara` WHERE anand.abook_id = ahmedabad.book_id AND anand.abook_id = gandhinagar.book_id AND anand.abook_id = mehsana.book_id AND anand.abook_id = rajkot.book_id AND anand.abook_id = surat.book_id AND anand.abook_id = vadodara.book_id AND anand.program = '$program'";

      $delimiter = ",";
    $filename = "Master_Inventory" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
       $fields = array('Book id', 'Book Name', 'An_Avail', 'An_Given', 'Ah_Avail', 'Ah_Given','Ga_Avail', 'Ga_Given','Me_Avail', 'Me_Given','Ra_Avail', 'Ra_Given', 'Su_Avail', 'Su_Given','Va_Avail', 'Va_Given','Program');
    fputcsv($f, $fields, $delimiter);

  if ($result =$conn->query($stmt))
   {

    while ($row = $result->fetch_assoc())
     {
      $lineData = array($row['book_id'], $row['book_name'], $row['available'], $row['given'], $row['ah_available'], $row['ah_given'], $row['ga_available'], $row['ga_given'], $row['me_available'], $row['me_given'], $row['ra_available'], $row['ra_given'], $row['su_available'], $row['su_given'],$row['va_available'], $row['va_given'], $row['program']);
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