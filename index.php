<?php
include 'connect_db.php';
if(isset($_POST['submit']))
{
    
  $username=$_POST['username'];
 $password=$_POST['password'];
 $position=$_POST['position'];
    
    
    if($position=='Admin')
{
    
$query="SELECT * FROM admin WHERE username={$username} AND password={$password}";
$result=mysqli_query($con,$query);
    
 $row=mysqli_fetch_assoc($result);
session_start();     
 echo $_SESSION['the_username']=$row['username'];
 $_SESSION['the_admin_id']=$row['admin_id'];
header("Location:../pharmacy2/admin.php");        
    }

if($position=='Pharmacist')
{
    
$query="SELECT * FROM pharmacist WHERE username={$username} AND password={$password}";
$result=mysqli_query($con,$query);
    
 $row=mysqli_fetch_assoc($result);
session_start();     
$_SESSION['the_username']=$row['username'];
$_SESSION['the_password']=$row['password'];
$_SESSION['the_pharmacist_id']=$row['pharmacist_id'];
$_SESSION['the_first_name']=$row['first_name'];
$_SESSION['the_last_name']=$row['last_name'];
$_SESSION['the_staff_id']=$row['staff_id'];
header("Location:../pharmacy2/pharmacist.php");
     
    }


}
?>



<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><img src="images/hd_logo.jpg">Pharmacy Sys</h1>
</div>
<div id="main">

  <section class="container">
  
     <div class="login">
	 <img src="images/hd_logo.jpg">
      <h1>Login here</h1>
	 <?php echo $message; ?>
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Pharmacist</option>
			<option>Cashier</option>
			<option>Manager</option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>
<div id="footer" align="Center"> Pharmacy Sys 2013. Copyright All Rights Reserved</div>
</div>
</body>
</html>
