<?php
session_start();
include "login_logic.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
 <link rel="stylesheet" href="styles.css">

</head>
<body>
	<div class="container">
	<h2 align="center">LOGIN</h2>
<div class="form">
<form name="loginpage" onsubmit="return onlogin();" action="" method="post">
	<div class="row">
	<div class="col-25">
	<label>User Id:-</label>	
	</div>
	<div class="col-75">
<input type="text" name="user_id" placeholder="Nick Name"/>
<div class="error"><p id="user_id_error"></p></div>
	</div>
	</div>
	<div class="row">
	<div class="col-25">
	<label>Password :-</label>
	</div>
	<div class="col-75">
<input type="password" name="password" placeholder="password"/>
<div class="error"><p id="password_error"></p></div>
	</div>
	</div>
	<br>
	<div class="row">
<input type="submit" name="login" value="LOGIN" />
<button type="reset" name="reloadlogin" Value="reloadlogin" onclick="return onreload();">RESET</button>
	</div>
</form>	
</div>
</div>

<script type="text/javascript">
	
	function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function onlogin()
{
var uuser_id = document.loginpage.user_id.value;
var upassword = document.loginpage.password.value;

	var user_id_error = password_error = true;
	
if(uemail== "")
  {
 	  printError("user_id_error", "Please enter  user id");
	
  }
  else
  {		
		 printError("user_id_error", "");
            email_error = false;
  }


  if(upassword== "")
		{
		  printError("password_error", "Please enter password");

		}
		else
		{
		 printError("password_error", "");
            password_error = false;
		}


	 if((user_id_error || password_error ) == true) 
	 {
       return false;
     }	
}


function onreload()
{
window.location.reload();
}

</script>
</body>
</html>