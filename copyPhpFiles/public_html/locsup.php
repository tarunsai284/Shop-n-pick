<?php require_once("./includes/functions.php")?>
<?php require_once("./includes/session.php")?>
<?php
	if(isset($_SESSION['uid'])&&isset($_POST['action']))
	{
		$result=array();
		if(trim($_POST['action'])=="cgloc")
		{
			$error="";
			$chk_value=array('lat','long','addr');
			foreach($chk_value as $c)
			{
				if(strlen(trim($_POST[$c]))==0)
					$error.="Error in &nbsp";
			}
			if($error=="")
			{
				$val=array('lat'=>mysql_prep(trim($_POST['lat'])),'long'=>mysql_prep(trim($_POST['long'])),'addr'=>mysql_prep(trim($_POST['addr'])));
				$qupdate="update userbasic set locid='".$val['lat']."/".$val['long']."',locaddr='".$val['addr']."' where userbasic.uid='".$_SESSION['uid']."'";
				$qupres=mysqli_query($connection,$qupdate);
				if($qupres)
				{
					$result['action']="cgloc";
					$result['success']=true;
				}
			}
			else
			{
				$result['success']=false;
				$result['msg']="Insufficient data";
			}	
			echo json_encode($result);
		}	
	}
?>