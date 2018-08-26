<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
?>
<?php
	$message="";
	if(isset($_POST['regi']))
	{
		$newacc=array();
		$newacc['name']=mysql_prep(trim($_POST['name']));
		$newacc['email']=mysql_prep(trim($_POST['email']));
		$newacc['pass']=sha1(mysql_prep(trim($_POST['pass'])));
		$newacc['phone']=mysql_prep(trim($_POST['phone']));
		$newacc['uid']="CH". rand(2,100).date('dihms');
		$newacc['otp']=random_password(4);
		$newacc['success']=true;
		$qcheck="select count(*) num,phoneno,email from userbasic,userpass where userbasic.uid=userpass.uid and phoneno='".$newacc['phone']."' or email='".$newacc['email']."'";
		$qckres=mysqli_query($connection,$qcheck);
		$uflag=array();
		$uflag['go']=false;
		$uflag['reason']="";
		if($qckres)
		{
			while($row=mysqli_fetch_array($qckres))
			{
				if($row['num']>0)
				{
					$uflag['go']=false;
					if(($row['phoneno']==$newacc['phone'])&&($row['email']==$newacc['email']))
						$uflag['reason'].="Both email and phone are Already exists";
					else if($row['phoneno']==$newacc['phone'])
						$uflag['reason'].=$newacc['phone']." is already exists";
					else if($row['email']==$newacc['email'])
						$uflag['reason'].=$newacc['email']." is already exists";

				}
				else
					$uflag['go']=true;
			}
		}
		else
			$uflag['reason']="".mysqli_error($connection);
		if($uflag['go'])
		{
			$ch = curl_init();
			$user="tarunsai284@gmail.com:qwerty12345";
			$receipientno=$newacc['phone'];
			$senderID="Test SMS";
			$msgtxt="Your OTP for registering in S'n'P is ".$newacc['otp']." visit our website http://www.snpuser.pe.hu";
			curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt&state=0");
			$buffer = curl_exec($ch);
			if(empty($buffer))
			{ $newacc['msgstatus']=false;$uflag['msgstatus']=false;
			  $uflag['msgmsg']="buffer is empty";
			}
			else
			{ $newacc['msgstatus']=true;$uflag['msgstatus']=true; }
			curl_close($ch);
			$newacc['qcheck']=true;
			if($newacc['msgstatus'])
			{
				$_SESSION['newuser']=$newacc;
				$uflag['data']=$_SESSION['newuser'];
			}
		}
		echo json_encode($uflag);
	}
	else if(isset($_POST['otp']))
	{
		$otp=mysql_prep(trim($_POST['otp']));
		$newacc=$_SESSION['newuser'];
		$result=array();
		if($otp==$_SESSION['newuser']['otp'])
		{
			$result['otpck']=true;
			if($_SESSION['newuser']['qcheck'])
			{
					$qpass="insert into userpass(uid,phoneno,password) values ('".$newacc['uid']."','".$newacc['phone']."','".$newacc['pass']."');";
					$quser="insert into userbasic(uid,name,email) values ('".$newacc['uid']."','".$newacc['name']."','".$newacc['email']."')";
					//echo $query;
					$req=mysqli_query($connection,$quser);
					$res=mysqli_query($connection,$qpass);
					if($res&&$req)
					{
						$_SESSION['uid']=$newacc['uid'];
						$result['acc_create_succ']=true;
					//curl
							$curl = curl_init();
							// Set some options - we are passing in a useragent too here
							curl_setopt_array($curl, array(
								CURLOPT_RETURNTRANSFER => 1,
								CURLOPT_URL => 'http://www.snpuser.pe.hu/mailde.php',
								CURLOPT_USERAGENT => 'Codular Sample cURL Request',
								CURLOPT_POST => 1,
								CURLOPT_POSTFIELDS => array(
									email =>$newacc["email"],
									type => 'welcome',
									name=>$newacc['name']
								)
							));
							// Send the request & save response to $resp
							$resp = curl_exec($curl);
							// Close request to clear up some resources
							curl_close($curl);

					}
					else
					{
						$result['acc_create_succ']=false;
						$message="Error".mysqli_error($connection)." error no.".mysqli_connect_errno();
					}
			}
		}
		else
		{
			$result['otpck']=false;
			//$result['pass']=$_SESSION['newuser'];
		}
		echo json_encode($result);
	}
?>
