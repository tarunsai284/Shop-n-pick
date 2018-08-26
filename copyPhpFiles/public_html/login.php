<?php require_once('includes/session.php')?>
<?php require_once('includes/functions.php');?>
<?php
	$try=false;$msg="";
	if(isset($_POST['logck']))
	{
		$try=true;
		$query="select uid from userpass where phoneno='".mysql_prep($_POST['phoneno'])."' and password='".sha1(mysql_prep($_POST['pass']))."'";
		$res=mysqli_query($connection,$query);
		if($res)
		{
			$row=mysqli_fetch_array($res);
			$_SESSION['uid']=$row['uid'];
			if(isset($_GET['returl'])&&file_exists($_GET['returl'].".php")){redirect_to($_GET['returl']);}else redirect_to("dashboard.php");
		}
		else
			echo "err".mysqli_error($con);
	}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
<?php if($try)echo "<h2>".$msg."</h2>";?>
		<form action="login.php"method="post">
			<input type="text" name="phoneno" placeholder="phone no"/>
			<input type="password" name="pass" placeholder="password" />
			<button name="logck" value="ck">Submit</button>
		</form>
	</body>
</html>