<?php
session_start();
require('../connection.php');
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="white">
<center><b><font color = "brown" size="8">College Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>MANAGE ADMINISTRATORS </h1>
<a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Surveys</a> | <a href="candidates.php">Manage options</a> | <a href="refresh.php">Poll Results</a>| <a href="suggestion.php">Suggestions</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysqli_query($conn, "INSERT INTO tbAdministrators(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
        or die( mysql_error($conn) );

die( "A new administrator account has been created." );
}
//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysqli_query($conn, "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE admin_id = '$myId'" )
        or die( mysql_error($conn) );

die( "An administrator account has been updated." );
}
?>
<table align="center">
<tr>
<td>
<form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<CAPTION><h4>UPDATE ACCOUNT</h4></CAPTION>
<tr><td>First Name:</td><td><input type="text" style="font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style="font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" style="font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
</table>
</form>
</td>
<td>
<form action="manage-admins.php" method="post" onSubmit="return registerValidate(this)">
<table align="center">
<CAPTION><h4>CREATE ACCOUNT</h4></CAPTION>
<tr><td>First Name:</td><td><input type="text" style="font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>Password:</td><td><input type="password" style="font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm Password:</td><td><input type="password" style="font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Create Account"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2017 All Rights Reserved</div>
</div>
</div>
</body></html>
