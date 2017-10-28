<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head><body bgcolor="tan">

<center><b><font color = "brown" size="8">College Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Student Registration </h1>
<div class="news"><marquee behavior="alternate">New poles are up! Help in building the future. Choose wisely! </marquee></div>
</div>
<div id="container">
<?php
require('connection.php');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysqli_query($conn,"INSERT INTO tbMembers(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
        or die( mysqli_error($conn) );

die( "You have registered for an account.<br><br>Go to <a href=\"index.html\">Login</a>" );
}

echo "<center><h3>Register Yourself here.</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td>First Name:</td><td><input type='text' style='font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' style='font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='text' style='font-weight:bold;' name='email' maxlength='100' value=''></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' style='font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Confirm Password:</td><td><input type='password' style='font-weight:bold;' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p>Already have an account? <a href='index.php'><b>Login Here</b></a></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2017 All Rights Reserved</div>
</div>
</div>
</body></html>
