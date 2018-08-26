<?php require_once("includes/session.php")?>
<?php require_once('includes/functions.php')?>
<?php

if(isset($_POST['action']))
    {
	
	$user=array();
	$uquery="select phoneno,name from userpass,userbasic where userbasic.uid=userpass.uid and userpass.phoneno='".$_POST['phone']."' and userpass.active=1";
	$ruser=mysqli_query($connection,$uquery);
	if($ruser)
	{   
	    
		if($row=mysqli_fetch_array($ruser))
                  {$user['name']=$row['name'];$user['phoneno']=$row['phoneno'];$user['success']='s';
                    echo json_encode($user);}
                else
                  {$user['success']='';echo json_encode($user);}
	}
        
	
	
	}
else
    {
       
	
    }
?>