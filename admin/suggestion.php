<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive candidates from the tbcandidates table
$result=mysqli_query($conn,"SELECT * FROM suggestion")
or die("There are no records to display ... \n" . mysqli_error($conn));
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 // delete the entry
 $result = mysqli_query($conn,"DELETE FROM suggestion WHERE suggestion_id='$id'")
 or die("The candidate does not exist ... \n");

 // redirect back to candidates
 header("Location: suggestion.php");
 }
 else
 // do nothing
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Suggestions</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="white">
<center><b><font color = "brown" size="8">College Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
  <h1>MANAGE SUGGESTIONS</h1>
  <a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Surveys</a> | <a href="candidates.php">Manage options</a> | <a href="refresh.php">Poll Results</a>| <a href="suggestion.php">Suggestions</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">

<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE SUGGESTIONS</h3></CAPTION>
<tr>
<th>Suggestion</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['description']."</td>";
echo '<td><a href="suggestion.php?id=' . $row['suggestion_id'] . '">Mark Done</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($link);
?>
</table>
<hr>
</div>
<div id="footer">
  <div class="bottom_addr">&copy; 2017 All Rights Reserved</div>
</div>
</div>
</body>
</html>
