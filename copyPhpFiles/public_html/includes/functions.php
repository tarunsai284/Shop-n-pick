<?php require_once("connection.php")?>
<?php require_once("session.php")?>
<?php
	// This file is the place to store all basic functions
	date_default_timezone_set('Asia/Kolkata');
	function mysql_prep( $value )
 {
	global $connection;		
$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysqli_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value =mysqli_real_escape_string($connection,$value);
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	function geoLoc()
	{
		$loc=array();
		$user_ip = getenv('REMOTE_ADDR');
		//$user_ip="117.216.112.150";
		$user_ip="61.3.233.145";
		//$user_ip="182.66.17.189";
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
		$loc['city'] = $geo["geoplugin_city"];
		$loc['state'] = $geo["geoplugin_regionName"];
		$loc['country'] = $geo["geoplugin_countryName"];
		return $loc;	
	}
	//echo json_encode(geoLoc());
	function getDet($uid,$con,$pro)
	{
		$user=[];$usercred=[];
		$user['success']=false;
		$user['found']=false;
		$query="";
		switch($pro)
		{
			case 1:
			$query="select userpass.uid,name,password,phoneno from userbasic,userpass where userbasic.uid=userpass.uid and userbasic.uid='".$uid."'";
			$usercred=['uid','name','password','phoneno'];
			break;
			case "basic":
			$query="select name,email,phoneno,locid,locaddr,acctype from userbasic,userpass where userbasic.uid=userpass.uid and userbasic.uid='".$uid."'";
			$usercred=['name','email','phoneno','locid','locaddr','acctype'];
			break;
			default:
			$query="non";
		}
		if($query!="non")
		{
			$res=mysqli_query($con,$query);
			if($res && (mysqli_num_rows($res)==1)){$row=mysqli_fetch_array($res);foreach($usercred as $i){$user[$i]=$row[$i];}$user['success']=true;$user['found']=true;}
			else
			{$user['msg']="Unable to connect to the backend.".mysqli_error($con);}
		}
		return $user;
	}
	
?>