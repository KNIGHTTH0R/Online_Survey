<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head><body bgcolor="tan">

<center><b><font color = "brown" size="8">College Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Student Login </h1>
<div class="news"><marquee behavior="alternate">New poles are up! Help in building the future. Choose wisely! </marquee></div>
</div>
<div id="container">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="white">
<tr>
<td width="78">Username/Email</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<center>
<br>Not yet registered? <a href="registeracc.php"><b>Register Here</b></a>
</center>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2017 All Rights Reserved</div>
</div>
</div>
</body></html>