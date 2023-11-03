<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "db_inventory.php";


	if (isset($_POST['update'])) 
	{
		$book_id = $_REQUEST['book_id'];
		$move_from = $_POST['move_from'];
		$move_to = $_POST['move_to'];
		$nbooks = $_POST['nbooks'];


			if($_POST['move_from']=='anand')
			{

				$stmt1 = "UPDATE $move_from SET available = available - '$nbooks' where abook_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='ahmedabad') 
				{
             $stmt2 = "UPDATE $move_to SET ah_available = ah_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='gandhinagar') 
				{
             $stmt2 = "UPDATE $move_to SET ga_available = ga_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='mehsana') 
				{
             $stmt2 = "UPDATE $move_to SET me_available = me_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='rajkot') 
				{
             $stmt2 = "UPDATE $move_to SET ra_available = ra_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='surat') 
				{
             $stmt2 = "UPDATE $move_to SET su_available = su_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='vadodara') 		
				{
             $stmt2 = "UPDATE $move_to SET va_available = va_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}
	elseif($_POST['move_from']=='ahmedabad')
			{

				$stmt1 = "UPDATE $move_from SET ah_available = ah_available - '$nbooks' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='anand') 
				{
             $stmt2 = "UPDATE $move_to SET available = available + '$nbooks' where abook_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='gandhinagar') 
				{
             $stmt2 = "UPDATE $move_to SET ga_available = ga_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='mehsana') 
				{
             $stmt2 = "UPDATE $move_to SET me_available = me_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='rajkot') 
				{
             $stmt2 = "UPDATE $move_to SET ra_available = ra_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='surat') 
				{
             $stmt2 = "UPDATE $move_to SET su_available = su_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='vadodara') 		
				{
             $stmt2 = "UPDATE $move_to SET va_available = va_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}

	elseif($_POST['move_from']=='gandhinagar')
			{

				$stmt1 = "UPDATE $move_from SET ga_available = ga_available - '$nbooks' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='anand') 
				{
             $stmt2 = "UPDATE $move_to SET available = available + '$nbooks' where abook_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='ahmedabad') 
				{
             $stmt2 = "UPDATE $move_to SET ah_available = ah_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='mehsana') 
				{
             $stmt2 = "UPDATE $move_to SET me_available = me_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='rajkot') 
				{
             $stmt2 = "UPDATE $move_to SET ra_available = ra_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='surat') 
				{
             $stmt2 = "UPDATE $move_to SET su_available = su_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='vadodara') 		
				{
             $stmt2 = "UPDATE $move_to SET va_available = va_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}	


	elseif($_POST['move_from']=='mehsana')
			{

				$stmt1 = "UPDATE $move_from SET me_available = me_available - '$nbooks' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='anand') 
				{
             $stmt2 = "UPDATE $move_to SET available = available + '$nbooks' where abook_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='gandhinagar') 
				{
             $stmt2 = "UPDATE $move_to SET ga_available = ga_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='ahmedabad') 
				{
             $stmt2 = "UPDATE $move_to SET ah_available = ah_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='rajkot') 
				{
             $stmt2 = "UPDATE $move_to SET ra_available = ra_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='surat') 
				{
             $stmt2 = "UPDATE $move_to SET su_available = su_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='vadodara') 		
				{
             $stmt2 = "UPDATE $move_to SET va_available = va_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}


	elseif($_POST['move_from']=='rajkot')
			{

				$stmt1 = "UPDATE $move_from SET ra_available = ra_available - '$nbooks' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='anand') 
				{
             $stmt2 = "UPDATE $move_to SET available = available + '$nbooks' where abook_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='gandhinagar') 
				{
             $stmt2 = "UPDATE $move_to SET ga_available = ga_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='mehsana') 
				{
             $stmt2 = "UPDATE $move_to SET me_available = me_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='ahmedabad') 
				{
             $stmt2 = "UPDATE $move_to SET ah_available = ah_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='surat') 
				{
             $stmt2 = "UPDATE $move_to SET su_available = su_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='vadodara') 		
				{
             $stmt2 = "UPDATE $move_to SET va_available = va_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}

	elseif($_POST['move_from']=='surat')
			{

				$stmt1 = "UPDATE $move_from SET su_available = su_available - '$nbooks' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='anand') 
				{
             $stmt2 = "UPDATE $move_to SET available = available + '$nbooks' where abook_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='gandhinagar') 
				{
             $stmt2 = "UPDATE $move_to SET ga_available = ga_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='mehsana') 
				{
             $stmt2 = "UPDATE $move_to SET me_available = me_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='rajkot') 
				{
             $stmt2 = "UPDATE $move_to SET ra_available = ra_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='ahmedabad') 
				{
             $stmt2 = "UPDATE $move_to SET ah_available = ah_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='vadodara') 		
				{
             $stmt2 = "UPDATE $move_to SET va_available = va_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}


		elseif($_POST['move_from']=='vadodara')
			{

				$stmt1 = "UPDATE $move_from SET va_available = va_available - '$nbooks' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
				
				if ($_POST['move_to']=='anand') 
				{
             $stmt2 = "UPDATE $move_to SET available = available + '$nbooks' where abook_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		

				}

				elseif ($_POST['move_to']=='gandhinagar') 
				{
             $stmt2 = "UPDATE $move_to SET ga_available = ga_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='mehsana') 
				{
             $stmt2 = "UPDATE $move_to SET me_available = me_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='rajkot') 
				{
             $stmt2 = "UPDATE $move_to SET ra_available = ra_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

					if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='surat') 
				{
             $stmt2 = "UPDATE $move_to SET su_available = su_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

				elseif ($_POST['move_to']=='ahmedabad') 		
				{
             $stmt2 = "UPDATE $move_to SET ah_available = ah_available + '$nbooks' where book_id= '$book_id'";
				$stmt2_exec = mysqli_query($conn, $stmt2);

						if ($stmt2_exec) 
							{
             		header("location:masterinventory_add.php");
							}		
				}

			}

			          	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Move Inventory</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1 align="center">Move Inventory</h1>
<form action="" method ="POST">
	<label  >Move From :</label>
<select name="move_from">
  <option >--Please Select Program--</option>	
  <option value="anand">ANAND</option>
  <option value="ahmedabad">AHMEDABAD</option>
  <option value="gandhinagar">GANDHINAGAR</option>
  <option value="mehsana">MEHSANA</option>
  <option value="rajkot">RAJKOT</option>
  <option value="surat">SURAT</option>
  <option value="vadodara">VADODARA</option>
</select><br><br><br>

<label >Move To :</label>
<select name="move_to">
  <option >--Please Select Program--</option>	
  <option value="anand">ANAND</option>
  <option value="ahmedabad">AHMEDABAD</option>
  <option value="gandhinagar">GANDHINAGAR</option>
  <option value="mehsana">MEHSANA</option>
  <option value="rajkot">RAJKOT</option>
  <option value="surat">SURAT</option>
  <option value="vadodara">VADODARA</option>
</select><br><br><br>


<label >Number of Books:</label>	
<input type='text' name='nbooks' size='10' required>
<br>
<br><br>
<input type="submit" style="float: left;"  onclick="location.href = 'masterinventory_add.php';" value="Back"/>
<input type='submit' name='update' value ='Update'>
</form>
</body>
</html>