
<?php

include "db_inventory.php";

$bno=$_REQUEST['bno'];
//var_dump($category_id);


  {
  

                  	$data = "SELECT * FROM `su_book` WHERE `bno`= '$bno'";
                  	$res=mysqli_query($conn,$data);

	                if($res ->num_rows)
    			    {
          			while($row=$res->fetch_assoc()) 
         
        			   {        	
               			         $bno= $row['bno'];
               			         $book_name = $row['book_name'];


          $stmt1 = "UPDATE surat SET su_available = su_available + 1 where book_name= '$book_name'";
		$stmt1_exec = mysqli_query($conn, $stmt1);         


            $stmt2 ="UPDATE surat SET su_given = su_given - 1 where book_name= '$book_name'";
		$stmt2exec = mysqli_query($conn, $stmt2);    			
               			         	
           				}  
        			}




                      $delete ="DELETE FROM `su_book` WHERE `bno`='$bno'";
                  
                      $que=mysqli_query($conn,$delete);


                      

                    
      if(isset($que))
       {
        header("location:surat_student.php");
       }  

  }

?>