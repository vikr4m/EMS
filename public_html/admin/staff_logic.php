<?php
 include "db_login.php";

function show_branch(){
  global  $con;
if (isset($_POST['show_branch'])) {
  
 $branch = $_POST['branch'];

 $stmt  = "SELECT * from login where `branch` ='$branch'";
//var_dump($stmt);
$stmt_exec = mysqli_query($con,$stmt);
  //var_dump($stmt_exec);
  if ($stmt_exec-> num_rows > 0) {
    while ($row = $stmt_exec->fetch_assoc()) 
    
    {
    
      $data[] = array('sid'=>$row['sid'] , 'name' => $row['name'],'email' => $row['email'],'designation' => $row['designation'], 'branch' => $row['branch'], 'contact_no' => $row['contact_no']); 

      
    }

    return $data;
    }
    

    elseif($stmt_exec-> num_rows <0){

      echo "No records found !";

    }


 //print_r($stmt);
 }
}


function staff_profile()
{
  global $con;
  $sid=$_REQUEST['sid'];
  
  $table_query = "SELECT * from login  WHERE sid ='$sid'";
  //var_dump($table_query);
    if ($result =$con->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $data[] = array('sid'=>$row['sid'] , 'name' => $row['name'], 'user_id' => $row['user_id'] ,'doj' => $row['doj'] ,'email' => $row['email'],'designation' => $row['designation'], 'branch' => $row['branch'], 'salary' => $row['salary'] , 'password' => $row['password'] ,'contact_no' => $row['contact_no']); 

        }

                             // echo '<pre>'; print_r($data);

      }
    
return $data;
}



?>


<?php

function edit_staff_form()
{
  global $con;
  $sid=$_REQUEST['sid'];

  $table_query = "SELECT * FROM login where `sid` ='$sid'";
  ////var_dump($my);
    if ($result =$con->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $data[] = array('name' => $row['name'], 'user_id' => $row['user_id'],  'email' => $row['email'] , 'doj' => $row['doj'] , 'salary' => $row['salary'] , 'password' => $row['password'] ,'contact_no' => $row['contact_no']  ); 
        }       

                              //echo '<pre>'; print_r($datas);

      }
    
return $data;
}
?>