
<?php
include "db_inventory.php";

function add_category() 
{
        global $conn;
        $value = array();
       $program =$_POST['program'];

        $addcategory= " SELECT * FROM anand WHERE `program`='$program' ";
      ////var_dump($sqlquery);  
        $res = mysqli_query($conn,$addcategory);
          if($res ->num_rows)
        {
          while($row=$res->fetch_assoc()) 
         
           {        
               $value[] ='<option value="'.$row['book_name'].'"> '.$row['book_name'].'</option>';         
           }  
        }

               return $value;
                    
}






 if(isset($_POST['add']))
{
    $sid=$_REQUEST['sid'];
    $book_name=$_POST['book_name'];

        
            $available_book = "SELECT available FROM anand  WHERE book_name = '$book_name'";
            //var_dump($available_book);
            $check_available_book = mysqli_query($conn,$available_book);
          //var_dump($check_available_book);
          if ($check_available_book-> num_rows > 0) 
              {
                while ($row = $check_available_book->fetch_assoc()) 
                {

                  $available = $row['available'];


                  if($row['available'] <= 0 )
                  {


                  echo "<p align ='center'><font color=red> Book is not available</font></p>"; 
                   }
                                    
            

            else
            {

            $book_query = "SELECT sid FROM an_book WHERE sid='$sid'AND book_name = '$book_name'";
            //var_dump($book_query);
            $check_book_query = mysqli_query($conn,$book_query);
            $count_book = mysqli_num_rows($check_book_query);
            if($count_book > 0)
              {
              echo "<p align='center'><font color=red> Already Given this book to the student.</font></p>";
              }

              else

              {  
                $insert ="INSERT INTO an_book (sid,book_name) VALUES ('$sid','$book_name') ";
            
                if ($result = $conn->query($insert)) 
                {
                $minus= "UPDATE anand SET available = available -1  where book_name='$book_name'";
                $quer = mysqli_query($conn,$minus);
             // var_dump($quer);
                $plus= "UPDATE anand SET given = given +1  where book_name='$book_name'";
                $query = mysqli_query($conn,$plus);
                // var_dump($query);
                 }
                }
              
              }
            }
          }

              
}
?>


<?php
function book_table() 
{
        global $conn;
        $data = array();
       $sid=$_REQUEST['sid'];
      
     
      $select_query="SELECT * FROM an_book where sid='$sid' ";
              ////var_dump($select_query);
              $result = mysqli_query($conn,$select_query);
              ////var_dump($result);
              if ($result-> num_rows > 0) 
              {
                while ($row = $result->fetch_assoc()) 
                {
                $data[] = array('bno' => $row['bno'],'book_name' => $row['book_name']); 
                 }
      

                return $data;
              }

                    
}



?>
