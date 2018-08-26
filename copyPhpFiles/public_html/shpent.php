<?php require_once("includes/session.php");?>
<?php require_once("includes/functions.php");?>
<?php
	if(isset($_SESSION['uid']))
	{
		$error="";$result=array();$action=array();$intval=array();
		$count=0;
		if(isset($_POST['level']))
		{
			$enttype=trim($_POST['enttype']);
			switch($enttype)
			{
				case "superm":
				$chk_value=array('superm','owner','enttype','regi_mail','phoneno','regi_addr','panno');
				break;
				case "indi":
				$chk_value=array('indishop','owner','panno','tinno','enttype','supermref','phoneno','address','latitude','longitude','regi_addr');
				default:
				$chk_array=array('agvhgvsgvg');
			}
			foreach($chk_value as $c)
			{
				$count+=1;
				if(strlen(trim($_POST[$c]))==0)
				{
					$error.="Error in &nbsp";
				}
			}
			if($error=="")
			{
				$cksta=true;
				switch($enttype)
				{
					case "superm":
					$entid="SUP". rand(2,100).date('dihms');
					$action['query']="Insert into superm(entid,ouid,name,owner,panno,regi_mail,phoneno,regi_addr) values('".$entid."','".$_SESSION['uid']."','".trim(mysql_prep($_POST['superm']))."','".trim(mysql_prep($_POST['owner']))."','".trim(mysql_prep($_POST['panno']))."','".trim(mysql_prep($_POST['regi_mail']))."','".trim(mysql_prep($_POST['phoneno']))."','".trim(mysql_prep($_POST['regi_addr']))."')";
					$result['success']=false;$result['suc_msg']=trim(mysql_prep($_POST['superm']))." was successfully created. You will be forwarded to next step.";$result['suc_ref']=$entid;
					break;
					case "indi":
					$intval=array();
					foreach($chk_value as $c)
					{
						$intval[$c]=trim(mysql_prep($_POST[$c]));
					}
					$intval['supermref']="indi";
					if(trim(mysql_prep($_POST['supermref']))!="indi")
					{
						$chk_query="select entid,owner,name,panno from superm where entid='".trim(mysql_prep($_POST['supermref']))."' and ouid='".$_SESSION['uid']."'";
						$ckres=mysqli_query($connection,$chk_query);
						if($ckres &&(mysqli_num_rows($ckres)==1))
						{
							$row=mysqli_fetch_array($ckres);
							if(($row['owner']==$intval['owner'])&&$row['panno']==$intval['panno']&&$row['name']==$intval['indishop'])
							{$cksta=true;$intval['supermref']=$row['entid'];}
							else
								$cksta=false;
						}
						else
							$cksta=false;
					}
					if($cksta)
					{
						$shpid="SHP".rand(2,100).date('dihms');
						$action['query']="insert into shopinfo(shpid,name,owner,panno,tinno,shop_type,ouid,addr,locid,phoneno) values('$shpid','".$intval['indishop']."','".$intval['owner']."','".$intval['panno']."','".$intval['tinno']."','".$intval['supermref']."','".$_SESSION['uid']."','".$intval['regi_addr']."','".$intval['latitude']."/".$intval['longitude']."','".$intval['phoneno']."');";
						$user=getDet($_SESSION['uid'],$connection,1);
						$action['query'].="insert into employee(empid,empat,type,phoneno,password,ouid,TOE) values('".'EMG'.rand(2,100).rand(2,100).date('dihms')."','$shpid','MANAGE','".$user['phoneno']."','".$user['password']."','".$_SESSION['uid']."','".date('dihms')."');";
						$action['query'].="insert into employee(empid,empat,type,phoneno,password,ouid,TOE) values('".'EOP'.rand(2,100).rand(2,100).date('dihms')."','$shpid','OPERATE','".$user['phoneno']."','".$user['password']."','".$_SESSION['uid']."','".date('dihms')."');";
						$result['success']=false;$result['suc_msg']=$intval['indishop']." is successfully created, but it will take us for sometime to verify the information. After that it will be online. But for time now go for the employee management for the shop.";
					}
					break;
				}
				if($cksta)
				{
				$res=mysqli_multi_query($connection, $action['query']);
				if($res)
					$result['success']=true;
				else $result['suc_msg']="Error in processing data".mysqli_error($connection);
				}
				else $result['suc_msg']="Error in processing data. Expecting an user interrupt with our system.".mysqli_error($connection);
			}
			else
			{$result['success']=false;$result['suc_msg']="Incomplete data entered";}
		}
		//var_dump($_POST);
		echo json_encode($result);
	}
?>