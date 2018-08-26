<?php require_once("includes/session.php")?>
<?php require_once("includes/functions.php")?>
<?php
	
	function checkfile($file)
	{
		if(file_exists($file.".php"))
			return $file.".php";
		else
			return "addshop.php";
	}
	function getName($uid,$connection){$query="select name from userbasic where uid='$uid'";$res=mysqli_query($connection,$query); if($res&&(mysqli_num_rows($res)==1)){$row=mysqli_fetch_array($res);return $row['name'];}}
	if(isset($_SESSION['uid']))
	{
	$name=getName($_SESSION['uid'],$connection);
	$mg=true;
	if(isset($_GET['action']))
	{
		$act=$_GET['action'];
		require_once(checkfile($act));
	}
	else
		require_once("addshop.php");
	}
	else
	{
		redirect_to("login.php");
	}
?>