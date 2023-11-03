<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
require "phpmailer/PHPMailerAutoload.php";
include "admin_master.php";
include "db_inventory.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<form action="" method="POST">
		<br>
	<br>
<input type="submit" name="check_stock" value="Check Stock"/>
<br>
<h1 align="center">Inventory</h1>
<label style=" margin-left: 15%" >Select Program :</label>
<select name="program">
  <option >--Please Select Program--</option>	
  <option value="UPSC">UPSC</option>
  <option value="GPSC">GPSC</option>
  <option value="IBPS">IBPS</option>
</select>

<input type="submit" value="Search">	
</form>

<br>

<table border="1" style ="border-collapse : collapse;" width = 70% align="center">
	<tr>
	<th>Sr. No.</th>
	<th>Id</th>
	<th>Name</th>
	<th>Available</th>
	<th>Given</th>
	</tr>
	<?php

    if(isset($_POST['program']))
    {
        
    if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*15)-15;
        }    
        
	$program = $_POST['program'];
	$i=1;
	$stmt = "SELECT * from anand WHERE `program`= '$program' limit $page1,15 ";
	$stmt_exec = mysqli_query($conn, $stmt);
	
	
		
		
	if ($stmt_exec-> num_rows > 0) 
	{
		while ($row = $stmt_exec->fetch_assoc()) 
		{
			$available = $row['available'];
			?>
			<tr>
				<td align='center'><?php echo $i; $i++ ?></td>
				<td align="center"><?php echo $row['abook_id']; ?></td>
				<td align="center"><?php echo $row['book_name']; ?></td>
				<td align="center"><?php echo $row['available']; ?></td>
				<td align="center"><?php echo $row['given']; ?></td>		
			</tr>
		<?php
		}		

			
	}
	echo "</table>";
		$stmt1 = "SELECT * from anand  WHERE `program`= '$program'  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/15;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="anand_inventory_disp.php?page=<?php echo $b;?>&&program=<?php echo $program;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	}
	?>
</p>
<br><br>

<input type="button"   onclick="location.href = 'anand_export_inventory.php?name=<?php echo $program;?>';"  value="Export"/>
<br><br><br><br>
<?php	

	
    }
elseif($_GET["program"])
    {
	$page = $_GET["page"];
	$program= $_GET["program"];

    if ($page=="" || $page=="1") 
        {
	    $page1=0;
        }

    else
        {
	    $page1= ($page*15)-15;
        }
        	
    $i=1;
	$stmt = "SELECT * from anand WHERE `program`= '$program' limit $page1,15 ";
	$stmt_exec = mysqli_query($conn, $stmt);
	
	
		
		
	if ($stmt_exec-> num_rows > 0) 
	{
		while ($row = $stmt_exec->fetch_assoc()) 
		{
			$available = $row['available'];
			?>
			<tr>
				<td align='center'><?php echo $i; $i++ ?></td>
				<td align="center"><?php echo $row['abook_id']; ?></td>
				<td align="center"><?php echo $row['book_name']; ?></td>
				<td align="center"><?php echo $row['available']; ?></td>
				<td align="center"><?php echo $row['given']; ?></td>		
			</tr>
		<?php
		}		

			
	}
    
    echo "</table>";    
        
	$stmt1 = "SELECT * from anand  WHERE `program`= '$program'  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/15;
$a= ceil($a);

echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="anand_inventory_disp.php?page=<?php echo $b;?>&&program=<?php echo $program;?>" style="text-decoration: none"><?php echo  $b."" ;?></a> <?php
	}
	?>
	</p>
<br><br>

<input type="button"   onclick="location.href = 'anand_export_inventory.php?name=<?php echo $program;?>';"  value="Export"/>
<br><br><br><br>
<?php	
        
}
    else
    {
        $page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*15)-15;
        }    
        
	$i=1;
	$stmt = "SELECT * from anand  limit $page1,15 ";
	$stmt_exec = mysqli_query($conn, $stmt);
	
	
		
		
	if ($stmt_exec-> num_rows > 0) 
	{
		while ($row = $stmt_exec->fetch_assoc()) 
		{
			$available = $row['available'];
			?>
			<tr>
				<td align='center'><?php echo $i; $i++ ?></td>
				<td align="center"><?php echo $row['abook_id']; ?></td>
				<td align="center"><?php echo $row['book_name']; ?></td>
				<td align="center"><?php echo $row['available']; ?></td>
				<td align="center"><?php echo $row['given']; ?></td>		
			</tr>
		<?php
		}		

			
	}
	echo "</table>";
		$stmt1 = "SELECT * from anand  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/15;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="anand_inventory_disp.php?page=<?php echo $b;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
	?>
</p>
<br><br>

<input type="button"   onclick="location.href = 'anand_export_inventory.php?';"  value="Export"/>
<br><br><br><br>
<?php	


}

	    
	

if(isset($_POST['check_stock']))
//Make sure you import it correctly.
{
	$stmt1 = "SELECT * from anand where available <= 20 ";
	$stmt1exec = mysqli_query($conn,$stmt1);
if($stmt1exec -> num_rows > 0)
{
	while($row = $stmt1exec->fetch_assoc())
	{

$book_name = $row['book_name'];
//Setup 
 
	

$body = "This is a test";
$body .= "<br>".$book_name."<br> ";
	



$mail=new PHPMailer;
   $mail->isSMTP();                                            // Send using SMTP
     $mail->Host       = 'smtp.hostinger.in';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;// Enable SMTP authentication
      $mail->Username   = 'sharvamdave@chahalems.com';/*email id */                     // SMTP username
    $mail->Password   = 'chahal1234';/*Password*/                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                  
                  
//FROM email
$mail->setFrom("sharvamdave@chahalems.com");
//Change to from email


$mail->addAddress("chahalacademy8@gmail.com");



//Change reply email, whom the reciever can reply.
//addCC
//addBCC 
// Attachments
//Add your attachement here.
//$mail->addAttachment('git-transport.png',"Git workflow image");         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);  // Set email format to HTML
//Change the subject.
$mail->Subject = 'Stock updation mail for Anand.';
//Change the content as per your wish.
$mail->Body = $body;
//For client not supporting HTML rendering.
$mail->AltBody = '<h1>Hello !!Anand Stock needs updation.</h1>';

$mail->send();			
	
	   }
	  }
	 }

	?>
	
</body>
</html>