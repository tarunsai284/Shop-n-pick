<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	if(isset($_POST['action']))
	{
		$result=array();
		if(trim($_POST['action'])=="login")
		{
			$error="";
			$chk_value=array('phone','password');
			foreach($chk_value as $c)
			{
				if(strlen(trim($_POST[$c]))==0)
					$error.="Error in &nbsp";
			}
			if($error=="")
			{
				$user=array('phone'=>mysql_prep(trim($_POST['phone'])),'pass'=>sha1(mysql_prep(trim($_POST['password']))));
				$query="select count(*) num,userpass.uid,name from userbasic,userpass where userpass.phoneno='".$user['phone']."' and password='".$user['pass']."' and userpass.uid=userbasic.uid";
				$res=mysqli_query($connection,$query);
				if($res)
				{
					while($row=mysqli_fetch_array($res))
					{
						if($row['num']==1)
						{	$result['success']=true;
							$result['name']=$row['name'];
							$_SESSION['uid']=$row['uid'];
						}
						else
						{$result['success']=false;$result['msg']="Multiple identity threat";}
					}
					
				}
				else
				{$result['success']=false;$result['msg']="Unable to process your request".mysqli_error($connection).$query;}
			}
			else
			 $result=array('success'=>false,'msg'=>'data insufficiency');
		}
		echo json_encode($result);
	}
?>