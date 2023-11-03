<?php

if(isset($_POST['add_book']))
{
  $book_id = $_POST['book_id'];    
  
  $book_name = $_POST['book_name'];

  $program = $_POST['program1'];
  
    if(empty($_POST['book_name']))
    {
        echo "<p align='center'><font color=red> Please Enter Book Name</font></p>";
    }
    
    elseif(empty($_POST['program1']))
    {
         echo "<p align='center'><font color=red> Please Fill The Program</font></p>"; 
    }
    elseif(empty($_POST['book_id']))
    {
         echo "<p align='center'><font color=red> Please Fill The Book ID</font></p>"; 
    }    
    else
    {

    $book_query = "SELECT book_id FROM ahmedabad WHERE book_name= '$book_name' OR book_id= '$book_id' LIMIT 1";
    $check_book_query = mysqli_query($conn,$book_query);
    $count_book = mysqli_num_rows($check_book_query);
    
    if($count_book > 0)
    {
      echo "<p align='center'><font color=red> This book name or book id is already existed </font></p>";
    }


    else
      {      
/*        $create_account ="INSERT into student(sname, gname , dob , gender ,wcontact )"*/
        $insert_book= " INSERT into anand (abook_id, book_name,  program, available , given  ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";

        $insert_book1= " INSERT into ahmedabad (book_id, book_name,  program, ah_available , ah_given  ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";
        
        $insert_book2= " INSERT into gandhinagar (book_id, book_name,  program, ga_available , ga_given  ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";
        
        $insert_book3= " INSERT into mehsana (book_id, book_name,  program, me_available , me_given ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";
        
        $insert_book4= " INSERT into rajkot (book_id, book_name,  program, ra_available , ra_given  ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";
        
        $insert_book5= " INSERT into surat (book_id, book_name,  program, su_available , su_given  ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";
        
        $insert_book6= " INSERT into vadodara (book_id, book_name,  program, va_available , va_given ) VALUES ('$book_id','$book_name','$program' , 0 , 0)";
        
        /*//var_dump($create_account);*/

          $create_account_query = mysqli_query($conn,$insert_book);
          $create_account_query1 = mysqli_query($conn,$insert_book1);
          $create_account_query2 = mysqli_query($conn,$insert_book2);
          $create_account_query3 = mysqli_query($conn,$insert_book3);
          $create_account_query4 = mysqli_query($conn,$insert_book4);
          $create_account_query5 = mysqli_query($conn,$insert_book5);
          $create_account_query6 = mysqli_query($conn,$insert_book6);
       /*   //var_dump($create_account_query);*/
           if($create_account_query)
        {

          echo "<p align='center'><font color=green> The book is entered in database.</font></p>"; 

        }
       

    }
    }
}





function show_inventory()
{
  global  $conn;
if (isset($_POST['show_inventory'])) 
{
  $program = $_POST['program'];

$stmt ="SELECT anand.* , ahmedabad.* , gandhinagar.* , mehsana.* , rajkot.* , surat.* , vadodara.* FROM `anand`,`ahmedabad`,`gandhinagar`,`mehsana`,`rajkot`,`surat`,`vadodara` WHERE anand.abook_id = ahmedabad.book_id AND anand.abook_id = gandhinagar.book_id AND anand.abook_id = mehsana.book_id AND anand.abook_id = rajkot.book_id AND anand.abook_id = surat.book_id AND anand.abook_id = vadodara.book_id AND anand.program = '$program'";


/*var_dump($stmt);*/
$stmt_exec = mysqli_query($conn,$stmt);
  /*var_dump($stmt_exec);*/

  if ($stmt_exec-> num_rows > 0) 
  {
    while ($row = $stmt_exec->fetch_assoc()) 
    
    	{



      		$data[] = array('book_id'=>$row['abook_id'], 'book_name'=>$row['book_name'],'available'=>$row['available'], 'available1' =>$row['ah_available'], 'available2' =>$row['ga_available'], 'available3' =>$row['me_available'], 'available4' => $row['ra_available'], 'available5' => $row['su_available'], 'available6' => $row['va_available'], 'given' => $row['given'], 'given1' => $row['ah_given'], 'given2' => $row['ga_given'], 'given3' => $row['me_given'], 'given4' => $row['ra_given'], 'given5' => $row['su_given'], 'given6' => $row['va_given'] ); 
   	
   		}
     

        return $data;
  }
 

 } 

}

?>