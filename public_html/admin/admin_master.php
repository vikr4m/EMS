<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="unnamed.ico" type="image/x-icon">

<style>


.navbar {
   margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #003b6e; 
}

.navbar a {

  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: #003059;
}

.subnav-content {
  display: none;
  position: absolute;

  background-color: #4a4946;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #363532;
  color: white;
}

.subnav:hover .subnav-content {
  display: block;
}

li {
  float: left;
  list-style-type: none;
}


</style>
</head>
<body>

<div class="navbar">
  <div class="subnav">
    <button class="subnavbtn">Anand </button>
    <div class="subnav-content">
      <li><a href="anand_lead.php">Leads</a></li>
      <li><a href="anand_student.php">Student</a></li>
      <li><a href="anand_course.php">Program</a>
      <li><a href="anand_expenditure.php">Expenditure</a></li>
      <li><a href="anand_inventory_disp.php">Inventory</a></li>
      <li><a href="anand_fees_information.php">Revenue</a></li>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Ahmedabad</button>
    <div class="subnav-content">
      <li><a href="ahmedabad_lead.php">Leads</a></li>
      <li><a href="ahmedabad_student.php">Student</a></li>
      <li><a href="ahmedabad_course.php">Program</a>
      <li><a href="ahmedabad_expenditure.php">Expenditure</a></li>
      <li><a href="ahmedabad_inventory_disp.php">Inventory</a></li>
      <li><a href="ahmedabad_fees_information.php">Revenue</a></li>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Gandhinagar</button>
    <div class="subnav-content">
      <li><a href="gandhinagar_lead.php">Leads</a></li>
      <li><a href="gandhinagar_student.php">Student</a></li>
      <li><a href="gandhinagar_course.php">Program</a>
      <li><a href="gandhinagar_expenditure.php">Expenditure</a></li>
      <li><a href="gandhinagar_inventory_disp.php">Inventory</a></li>
      <li><a href="gandhinagar_fees_information.php">Revenue</a></li>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Surat </button>
    <div class="subnav-content">
      <li><a href="surat_lead.php">Leads</a></li>
      <li><a href="surat_student.php">Student</a></li>
      <li><a href="surat_course.php">Program</a>
      <li><a href="surat_expenditure.php">Expenditure</a></li>
      <li><a href="surat_inventory_disp.php">Inventory</a></li>
      <li><a href="surat_fees_information.php">Revenue</a></li>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Rajkot</button>
    <div class="subnav-content">
      <li><a href="rajkot_lead.php">Leads</a></li>
      <li><a href="rajkot_student.php">Student</a></li>
      <li><a href="rajkot_course.php">Program</a>
      <li><a href="rajkot_expenditure.php">Expenditure</a></li>
      <li><a href="rajkot_inventory_disp.php">Inventory</a></li>
      <li><a href="rajkot_fees_information.php">Revenue</a></a></li>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Vadodara</button>
    <div class="subnav-content">
      <li><a href="vadodara_lead.php">Leads</a></li>
      <li><a href="vadodara_student.php">Student</a></li>
      <li><a href="vadodara_course.php">Program</a>
      <li><a href="vadodara_expenditure.php">Expenditure</a></li>
      <li><a href="vadodara_inventory_disp.php">Inventory</a></li>
      <li><a href="vadodara_fees_information.php">Revenue</a></li>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Mehsana</button>
    <div class="subnav-content">
      <li><a href="mehsana_lead.php">Leads</a></li>
      <li><a href="mehsana_student.php">Student</a></li>
      <li><a href="mehsana_course.php">Program</a>
      <li><a href="mehsana_expenditure.php">Expenditure</a></li>
      <li><a href="mehsana_inventory_disp.php">Inventory</a></li>
      <li><a href="mehsana_fees_information.php">Revenue</a></li>
    </div>
  </div>
  
  <li><a href="masterinventory_add.php" align="">Master Inventory</a></li>
  
  <li><a href="staff.php" align="">Staff</a></li>
  <li><a href="genexpdisp.php" align="">General Expenditure</a></li>


  <li style="float:right"><a href="logout.php" align="">Logout</a></li>
  
</div>



</body>
</html>
