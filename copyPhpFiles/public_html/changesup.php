<?php require_once("./includes/functions.php")?>
<?php require_once("./includes/session.php")?>
<?php
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
	if(isset($_POST['action']))
	{
		$error="";
		$result=array();
		$action=array();
		$act=trim($_POST['action']);
		switch($act)
		{
			case "cgpass":
			$chk_value=array('oldpass','newpass','cnewpass');
			break;
			case "cgmail":
			$chk_value=array('newmail','password');
			break;
			case "cgphone":
			$chk_value=array('newphone','password');
			break;
			default:
			$chk_value=array('abrakadabr');
		}
		foreach($chk_value as $c)
		{
			$count+=1;
			if(strlen(trim($_POST[$c]))==0)
			{
				$errcount +=1;
				$error.="Error in &nbsp";
			}
		}
		if($error=="")
		{
			switch($act)
			{
				case "cgpass":
				if(mysql_prep(trim($_POST['newpass']))==mysql_prep(trim($_POST['cnewpass'])))
				{$action['query']="update userpass set password='".sha1(mysql_prep(trim($_POST['newpass'])))."' where uid='".$_SESSION['uid']."' and password='".sha1(mysql_prep(trim($_POST['oldpass'])))."'";$action['input_val']=true;}
				else
				{$action['input_val']=false;$action['errmsg']="Both the new passwords didn't match";}
				break;
				case "cgmail":
				if (!filter_var(mysql_prep(trim($_POST['newmail'])), FILTER_VALIDATE_EMAIL) === false) {
				  $action['input_val']=true;
				  $action['query']="update userbasic,userpass set email='".mysql_prep(trim($_POST['newmail']))."' where password='".sha1(mysql_prep(trim($_POST['password'])))."' and userbasic.uid='".$_SESSION['uid']."' and userbasic.uid=userpass.uid";
				  } else {
				  $action['input_val']=false;$action['errmsg']="Invalid Email format.";}
				break;
				case "cgphone":
				if(strlen(mysql_prep(trim($_POST['newphone'])))==10)
				{ 
				  $action['input_val']=true;
				  $action['query']="select count(*) num from userpass where uid='".$_SESSION['uid']."' and password='".sha1(mysql_prep(trim($_POST['password'])))."'";
				  //$_SESSION['cgphone']=array('uid':$_SESSION['uid'],'phone':mysql_prep(trim($_POST['newphone'])));
				}
				else{$action['input_val']=false;$action['errmsg']="Invalid phone number";}
				break;
				default:
				$action['input_val']=false;
				$action['errmasg']="Invalid operation";
			}
			if($action['input_val'])
			{
				$res=mysqli_query($connection,$action['query']);
				if($res)
				{
					if($act=="cgphone")
					{
						$row=mysqli_fetch_array($res);
						if($row['num']==1)
						{
							$_SESSION['cgphone']=array('uid'=>$_SESSION['uid'],'phone'=>mysql_prep(trim($_POST['newphone'])),'otp'=>random_password(4));
						}							
					}
					else
					{
						if((mysqli_affected_rows($connection)==1))
							$result['success']=true;
						else
							$result['success']=false;
					}
				}
				else
				{$result['success']=false;$result['msg']=mysqli_error($connection);}
			}			
		}
		else
		{{$result['success']=false;$result['msg']="Insufficient data provided";}}
		array_push($result,$action);
		if(isset($_SESSION['cgphone']))
			array_push($result,$_SESSION['cgphone']);
		echo json_encode($result);
	}
	
?>