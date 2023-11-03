<?php
include "db_login.php";


if(isset($_POST['login']))
{   

    //echo '<pre>';print_r($_POST);
    $user_id =$_POST['user_id'];
    $password = $_POST['password'];
   
    if(empty($_POST['password']))
    {
        echo "<p align='center'><font color=red> Please Enter Password</font></p>";
    }

    else
    {
        $login ="SELECT * FROM login WHERE user_id='$user_id' and password='$password'";
        //var_dump($login);
        $login_query = mysqli_query($con,$login);
        
          if($row=mysqli_fetch_assoc($login_query))
            {

                    $user_id=$row['user_id'];
                    $branch =$row['branch'];
               session_start();

               $_SESSION['uid'] = $user_id;
               $_SESSION['branch'] = $branch;
               //var_dump($_SESSION['uid']);
               //var_dump($_SESSION['admin']);

                if($_SESSION['branch']=='admin')
                  {
                   header("location:admin/welcome.php");          
                  }
                elseif($_SESSION['branch']=='anand')
                  {
                    header("location:anand/index.php");
                  }
                elseif($_SESSION['branch']=='ahmedabad')
                  {
                    header("location:ahmedabad/index.php");
                  }
                elseif($_SESSION['branch']=='gandhinagar')
                  {
                    header("location:gandhinagar/index.php");
                  }
                elseif($_SESSION['branch']=='surat')
                  {
                    header("location:surat/index.php");
                  }
                elseif($_SESSION['branch']=='rajkot')
                  {
                    header("location:rajkot/index.php");
                  }
                elseif($_SESSION['branch']=='vadodara')
                  {
                    header("location:vadodara/index.php");
                  }
                elseif($_SESSION['branch']=='mehsana')
                  {
                    header("location:mehsana/index.php");
                  }

               }
          
          
          else
            {
        
            echo "<p align='center'><font color=red>  Please Check Your Email Id and Password </font></p>";
    
           }
         
    }
     
}






?>