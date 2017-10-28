<?php
session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
//retrive student details from the tbmembers table
$result=mysqli_query($conn,"SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
or die("There are no records to display ... \n" . mysqli_error($conn));
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
// suggesting survey
if (isset($_POST['suggestsurvey'])){
$myId = addslashes( $_GET[id]);
$mySuggestion = addslashes( $_POST['suggestsurveytext'] ); //prevents types of SQL injection


$sql = mysqli_query($conn,"INSERT INTO suggestion (description) VALUES ('$mySuggestion') " )
        or die( mysqli_error($conn) );

// redirect back to profile
 header("Location: suggestion.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Profile Management</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="tan">

<center><b><font color = "brown" size="8">College Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
  <h1>MANAGE MY PROFILE</h1>
  <a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="suggestion.php">Suggest Surveys</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table>
<tr>
<td>
<table border="0" width="620" align="center">
<CAPTION><h3>Suggest Surveys</h3></CAPTION>
<form action="suggestion.php" method="post" onsubmit="return updatesuggestion(this)">
<table align="center">
<tr><td>Survey Description:</td><td><textarea type="text" style="font-weight:bold;" name="suggestsurveytext" rows="4" cols="50" value=""></textarea></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="suggestsurvey" value="Submit Survey"></td></tr>
</table>
</form>
</td>
</tr>
</table>
<hr>
</div>
<div id="footer">
  <div class="bottom_addr">&copy; 2017 All Rights Reserved</div>
</div>
</div>
</body>
</html>
