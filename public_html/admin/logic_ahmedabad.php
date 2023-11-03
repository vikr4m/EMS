<?php
include "db_ahmedabad.php";

function student_table()
{
  global $conn;

    if($_POST['name'])
    {

   $datas =  $_POST['name'];
    

  $table_query = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname ";

    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
        {
        
          
     $data[] = array('sid' => $row['sid'],'sname' => $row['sname'], 'dob' => $row['dob']  ,'doj' => $row['doj'] ,'wcontact' => $row['wcontact'], 'econtact' => $row['econtact'] ,'fee_t' =>$row['fee_t'], 'fee_p' => $row['fee_p'], 'fee_r' => $row['fee_r'], 'programme' => $row['programme'], 'duration' => $row['duration'], 'course' => $row['course'],); 
        }       


                              //echo '<pre>'; print_r($datas);

      }
    }

    else
    {
         $table_query = "SELECT * FROM student order by sname ";

    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
        {
        
          
     $data[] = array('sid' => $row['sid'],'sname' => $row['sname'], 'dob' => $row['dob'] ,'doj' => $row['doj'],'wcontact' => $row['wcontact'], 'econtact' => $row['econtact'] ,'fee_t' =>$row['fee_t'], 'fee_p' => $row['fee_p'], 'fee_r' => $row['fee_r'], 'programme' => $row['programme'], 'duration' => $row['duration'], 'course' => $row['course']); 
        }       


                              //echo '<pre>'; print_r($datas);

      }

    }
    
return $data;
}
?>

<!---------------------------Add Student Details------------------------------>

<?php

function add_course()
{
  global $conn;
  $table_query = "SELECT * FROM course_type";
  ////var_dump($my);
  $value = array();
    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $value[] = '<option value = "'.$row['course'].'">'.$row['course'].'</option>';

        }       
         //echo '<pre>'; print_r($datas);

      }
    
return $value;

}
?>


<?php

if(isset($_POST['add_student']))
{
  $sname = $_POST['sname'];
  $gname = $_POST['gname'];
  $dob = $_POST['dob'];
  $doj = $_POST['doj'];
  $gender = $_POST['gender'];
  $wcontact = $_POST['wcontact'];
  $econtact = $_POST['econtact'];
  $programme = $_POST['programme'];
  $course = $_POST['course']; 
  $duration = $_POST['duration'];
  $fees_t =$_POST['fees_t'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];

    $email_query = "SELECT sid FROM student WHERE email= '$email' LIMIT 1";
    $check_email_query = mysqli_query($conn,$email_query);
    $count_email = mysqli_num_rows($check_email_query);
    
    if($count_email > 0)
    {
      echo "<p align='center'><font color=red> Email Address you entered is already in use try another email address </font></p>";
    }

    $mobile_query = "SELECT sid FROM student WHERE wcontact= '$wcontact' LIMIT 1";
    $check_mobile_query = mysqli_query($conn,$mobile_query);
    $count_mobile = mysqli_num_rows($check_mobile_query);
    
    if($count_mobile > 0)
    {
      echo "<p align='center'><font color=red> Mobile number you entered is already in use try another mobile number </font></p>";
    }
    
  elseif (empty($_POST['sname'])) 
      {
        echo "<p align='center'><font color=red> Required Field Student Name</font></p>";
      }
      elseif (!preg_match(" /^[A-Z a-z]+$/",$sname)) 
      {
         echo "<p align='center'><font color=red> Student Name must have alphabets only</font></p>"; 
      }

  elseif (!preg_match(" /^[A-Z a-z]+$/",$gname)) 
      {
         echo "<p align='center'><font color=red> Guardian Name must have alphabets only</font></p>"; 
      }      
          
  elseif (empty($_POST['email'])) 
      {
         echo "<p align='center'><font color=red> Required Field Email</font></p>";
      }
      elseif(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email))
      {
          echo "<p align='center'><font color=red>You have entered invalid Email Id </font></p>";  
      } 

  elseif (!preg_match("/^([0-9]){10}$/", $wcontact)) 
      {
          echo "<p align='center'><font color=red> 10 Digit Mobile Number Only</font></p>";
      }  
  elseif (!preg_match("/^([0-9]){10}$/", $econtact)) 
      {
          echo "<p align='center'><font color=red> 10 Digit Mobile Number Only</font></p>";
      }           
    else
      {      

       /* $delete= "DELETE  from `leads`  WHERE `phone` = '$wcontact' and `email` = '$email'";
        $stmt_query1 = mysqli_query($conn,$delete);*/

        $stmt= " INSERT into student (sname, gname , dob , doj , gender , wcontact , econtact ,programme , course , duration , email ,  cor_address , pincode , fee_t, fee_r) VALUES ('$sname','$gname', '$dob', '$doj' ,'$gender' ,'$wcontact','$econtact', '$programme' ,'$course','$duration' ,'$email','$address','$pincode','$fees_t','$fees_t')";
        //var_dump($stmt);
          $stmt_query = mysqli_query($conn,$stmt);
          {
             echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
          }
    }
}
?>  


<!-- Edit Student personal Information -->


<?php

if(isset($_POST['edit_add_student']))
{
  $sid=$_REQUEST['sid'];
   //$sid = isset($_GET['sid']) ? $_GET['sid'] : '';

  $sname = $_POST['sname'];
  $gname = $_POST['gname'];
  $dob = $_POST['dob'];
  $doj = $_POST['doj'];
  $gender = $_POST['gender'];
  $wcontact = $_POST['wcontact'];
  $econtact = $_POST['econtact'];
  $programme = $_POST['programme'];
  $course = $_POST['course']; 
  $duration = $_POST['duration'];
  $fees_t =$_POST['fees_t'];
  $fees_r =$_POST['fees_r'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];

    

    if (empty($_POST['sname'])) 
      {
        echo "<p align='center'><font color=red> Required Field Student Name</font></p>";
      }
  elseif (!preg_match(" /^[A-Z a-z]+$/",$sname)) 
      {
         echo "<p align='center'><font color=red> Student Name must have alphabets only</font></p>"; 
      }

  elseif (!preg_match(" /^[A-Z a-z]+$/",$gname)) 
      {
         echo "<p align='center'><font color=red> Guardian Name must have alphabets only</font></p>"; 
      }      
          
  elseif (empty($_POST['email'])) 
      {
         echo "<p align='center'><font color=red> Required Field Email</font></p>";
      }
      elseif(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email))
      {
          echo "<p align='center'><font color=red>You have entered invalid Email Id </font></p>";  
      } 

  elseif (!preg_match("/^([0-9]){10}$/", $wcontact)) 
      {
          echo "<p align='center'><font color=red> 10 Digit Mobile Number Only</font></p>";
      }  
  elseif (!preg_match("/^([0-9]){10}$/", $econtact)) 
      {
          echo "<p align='center'><font color=red> 10 Digit Mobile Number Only</font></p>";
      }           
    else
      {      

     $update = " UPDATE `student` SET `sname` = '$sname' , `gender` = '$gender' , `gname` = '$gname' , `dob` = '$dob' , `doj` = '$doj' ,  `wcontact` = '$wcontact', `econtact` = '$econtact', `programme` = '$programme' ,`course` = '$course',`duration`= '$duration' , `email` = '$email', `cor_address` = '$address', `pincode` = '$pincode', `fee_t` = '$fees_t',  `fee_r` = '$fees_r' WHERE `sid` = '$sid' ";

//var_dump($update);
          $stmt_query = mysqli_query($conn,$update);
      
          {
          echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
          }
    }
}
?>  



<!---------------------- Add Leads Details ---------------------------->


<?php

if(isset($_POST['add_lead']))
{
  if(isset($_SESSION['uid']))
          {
            $lead_by = $_SESSION['uid'];
    
          }

  $name = $_POST['name'];
  $wmobile = $_POST['wmobile'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $programme = $_POST['programme'];
  $course = $_POST['course'];
  $source = $_POST['source'];
  $comments = $_POST['comments'];
  $doi = $_POST['doi'];


    $mobile_query = "SELECT sid FROM student WHERE wcontact= '$wmobile' LIMIT 1";
    $check_mobile_query = mysqli_query($conn,$mobile_query);
    $count_mobile = mysqli_num_rows($check_mobile_query);
    
    if($count_mobile > 0)
    {
      echo "<p align='center'><font color=red> Mobile number you entered is already in use try another mobile number </font></p>";
    }

  elseif (empty($_POST['name'])) 
      {
        echo "<p align='center'><font color=red> Required Field Student Name</font></p>";
      }
      elseif (!preg_match(" /^[A-Z a-z]+$/",$name)) 
      {
         echo "<p align='center'><font color=red> Student Name must have alphabets only</font></p>"; 
      }

  elseif (empty($_POST['email'])) 
      {
         echo "<p align='center'><font color=red> Required Field Email</font></p>";
      }
      elseif(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email))
      {
          echo "<p align='center'><font color=red>You have entered invalid Email Id </font></p>";  
      } 

  elseif (!preg_match("/^([0-9]){10}$/", $wmobile)) 
      {
          echo "<p align='center'><font color=red> 10 Digit Mobile Number Only</font></p>";
      }  

    else
      {      

        $create_account= " INSERT into leads ( name, phone ,  email , dob , programme ,course ,  source, lead_by , comments, date ) VALUES ('$name','$wmobile', '$email', '$dob' , '$programme' ,'$course', '$source'  ,'$lead_by' , '$comments' ,'$doi' )";
 //       //var_dump($create_account);

          $create_account_query = mysqli_query($conn,$create_account);

          {
          echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
          }
      }
}
?>

<!------------------------------ Student Profile ---------------------------------------->


<?php

function student_profile()
{
  global $conn;
  $sid=$_REQUEST['sid'];
  
  $table_query = "SELECT * FROM student WHERE sid='$sid'";
  ////var_dump($my);
    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $data[] = array('sname' => $row['sname'], 'gname' => $row['gname'] ,  'dob' => $row['dob'] , 'doj' => $row['doj'] ,'gender' => $row['gender'] , 'wcontact' => $row['wcontact'] , 'programme' => $row['programme'],'email' => $row['email'], 'cor_address' => $row['cor_address'] ); 
        }       

          

                              //echo '<pre>'; print_r($datas);

      }
    
return $data;
}
?>

<!------------------------------ Book Details -------------------------------------->


<?php

function  arraytostring($dropdown,$result_string)
{

    foreach($dropdown as $key => $value)
    {

         if(is_array($value) ) 
          {

                  $result_string = arraytostring($value,$result_string);

          }
          else
             {
                 $result_string .= $value;     

              }
     }
      return $result_string;
 
}


?>


<!----------------------------------------- add_book -------------------------------->


<!-- --------------------------- show Course ----------------------------- -->


<?php


function show_course(){
  global  $conn;
if (isset($_POST['show_course'])) {
  
 $course = $_POST['programme'];

 $stmt  = "SELECT * from student where `programme` ='$course'";
////var_dump($stmt);
$stmt_exec = mysqli_query($conn,$stmt);
  ////var_dump($stmt_exec);
  if ($stmt_exec-> num_rows > 0) {
    while ($row = $stmt_exec->fetch_assoc()) {
      $data[] = array('sid' => $row['sid'],'sname' => $row['sname'] , 'dob' => $row['dob'] , 'doj' => $row['doj']  ,'wcontact' => $row['wcontact'],'course' => $row['course'],'email' => $row['email'], 'fee_t' => $row['fee_t'], 'fee_p' => $row['fee_p'], 'fee_r' => $row['fee_r'] ,'programme' => $row['programme'], 'duration' => $row['duration'], 'course' => $row['course']); 
      
      }

    return $data;
    }
    


 //print_r($stmt);
 }
}
 ?>


 <!---------------------- expen Logic ------------------------>

 <?php



if(isset($_POST['add_expenditure']))
{
        if(isset($_SESSION['uid']))
       {
          $entry_by = $_SESSION['uid'];
       }

  $type = $_POST['type'];
  $sub = $_POST['subtype'];
  $description = $_POST['description'];
  $bill =$_POST['bill'];
  $date = $_POST['date'];
  $amount = $_POST['amount'];
  $modeofpay = $_POST['modeofpay'];
  $neftchequeno = $_POST['neft/cheque_no'];

 
  if (empty($_POST['subtype']))
  {
    echo "<p align='center'><font color=red> Please Enter SubType</font></p>";
  } 

    elseif (empty($_POST['description']))
  {
    echo "<p align='center'><font color=red> Please Enter Description</font></p>";
  } 

    elseif (empty($_POST['date']))
  {
    echo "<p align='center'><font color=red> Please Enter Date</font></p>";
  } 
  elseif (empty($_POST['bill']))
  {
    echo "<p align='center'><font color=red> Please Enter Date</font></p>";
  } 
    
    elseif (empty($_POST['amount']))
  {
    echo "<p align='center'><font color=red> Please Enter Amount</font></p>";
  } 
  
    elseif (empty($_POST['modeofpay']))
  {
    echo "<p align='center'><font color=red> Please Enter Mode of Payment</font></p>";
  } 
  

    else
    {

      $stmt = "INSERT INTO expenditure (`type`, `subtype`  , `date` , `bill`  , `description`  , `entry_by` ,`amount` , `modeofpay` , `neft/cheque_no`) VALUES ('$type', '$sub' , '$date' , '$bill' , '$description' , '$entry_by' ,'$amount', '$modeofpay','$neftchequeno')";

        $stmt_exec = mysqli_query($conn,$stmt);

        {
        echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
        }
    }

}

?>

 <?php
function add_expen_category()
{
  global $conn;
  $table_query = "SELECT * FROM expen_type";
  ////var_dump($my);
  $value = array();
    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $value[] = '<option value = "'.$row['type'].'">'.$row['type'].'</option>';

        }       
         //echo '<pre>'; print_r($datas);

      }
    
return $value;

}
?>


<?php

function edit_student_form()
{
  global $conn;
  $sid=$_REQUEST['sid'];

  $table_query = "SELECT * FROM student where `sid` ='$sid'";
  ////var_dump($my);
    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $data[] = array('sname' => $row['sname'], 'gname' => $row['gname'] , 'email' => $row['email'] , 'dob' => $row['dob'], 'doj' => $row['doj'] , 'gender' => $row['gender'] ,'wcontact' => $row['wcontact'] , 'econtact' => $row['econtact'] , 'cor_address' => $row['cor_address'] ,'pincode' => $row['pincode']  ,'fee_t' =>$row['fee_t'], 'fee_r' =>$row['fee_r'], 'programme' => $row['programme'], 'duration' => $row['duration'], 'course' => $row['course'],); 
        }       

                              //echo '<pre>'; print_r($datas);

      }
    
return $data;
}
?>


<?php

function edit_lead_form()
{
  global $conn;
  $id=$_REQUEST['id'];
  $data = array();

  $table_querys = "SELECT * FROM leads where `id` ='$id'";
  //var_dump($table_query);
    if ($result =$conn->query($table_querys))
    {
      while ($rows = $result->fetch_assoc())
        {
 
    // var_dump($rows['name']);
          
     $data[] = array('name' => $rows['name'],  'email' => $rows['email'] , 'dob' => $rows['dob'] , 'wcontact' => $rows['phone']  , 'programme' => $rows['programme'],  'course' => $rows['course'], 'source' => $rows['source'], 'comments' => $rows['comments'], 'date' => $rows['date'] ); 
        
        }


                             //echo '<pre>'; print_r($data);

      }
    
return $data;
}
?>


<?php

if(isset($_POST['edit_add_lead']))
{
  if(isset($_SESSION['uid']))
          {
            $lead_by = $_SESSION['uid'];
    
          }

  $id=$_REQUEST['id'];

  $name = $_POST['name'];
  $wmobile = $_POST['wmobile'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $programme = $_POST['programme'];
  $course = $_POST['course'];
  $source = $_POST['source'];
  $comments = $_POST['comments'];
  $doi = $_POST['doi'];


    $mobile_query = "SELECT sid FROM student WHERE wcontact= '$wmobile' LIMIT 1";
    $check_mobile_query = mysqli_query($conn,$mobile_query);
    $count_mobile = mysqli_num_rows($check_mobile_query);
    
    if($count_mobile > 0)
    {
      echo "<p align='center'><font color=red> Mobile number you entered is already in use try another mobile number </font></p>";
    }

  elseif (empty($_POST['name'])) 
      {
        echo "<p align='center'><font color=red> Required Field Student Name</font></p>";
      }
      elseif (!preg_match(" /^[A-Z a-z]+$/",$name)) 
      {
         echo "<p align='center'><font color=red> Student Name must have alphabets only</font></p>"; 
      }

  elseif (empty($_POST['email'])) 
      {
         echo "<p align='center'><font color=red> Required Field Email</font></p>";
      }
      elseif(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email))
      {
          echo "<p align='center'><font color=red>You have entered invalid Email Id </font></p>";  
      } 

  elseif (!preg_match("/^([0-9]){10}$/", $wmobile)) 
      {
          echo "<p align='center'><font color=red> 10 Digit Mobile Number Only</font></p>";
      }  

    else
      {      

           $update = " UPDATE `leads` SET `name` = '$name'  , `phone` = '$wmobile', `dob` ='$dob' ,`programme` = '$programme' ,`course` = '$course', `comments` = '$comments ', `source` = '$source ' , `email` = '$email', `lead_by` = '$lead_by', `date` = '$doi'  WHERE `id` = '$id' ";



      /*  $create_account= " INSERT into leads ( name, phone ,  email , dob , programme ,course , courses , source, sources , lead_by , date ) VALUES ('$name','$wmobile', '$email', '$dob' , '$programme' ,'$course', '$courses' , '$source' , '$sources' ,'$lead_by' , '$doi' )";*/
 //       //var_dump($create_account);

          $update = mysqli_query($conn,$update);

          {
echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
          }
      }
}
?>


<?php

function edit_expenditure_form()
{
  global $conn;
  $id=$_REQUEST['id'];
  $data = array();

  $table_querys = "SELECT * FROM expenditure where `id` ='$id'";
  //var_dump($table_query);
    if ($result =$conn->query($table_querys))
    {
      while ($rows = $result->fetch_assoc())
        {
 
    // var_dump($rows['name']);
          
     $data[] = array('id' => $rows['id'], 'type' => $rows['type'],  'subtype' => $rows['subtype'] , 'date' => $rows['date'] , 'bill' => $rows['bill']  , 'description' => $rows['description'],  'amount' => $rows['amount'], 'neft/cheque_no' => $rows['neft/cheque_no'], ); 
        
        }


                             //echo '<pre>'; print_r($data);

      }
    
return $data;
}
?>