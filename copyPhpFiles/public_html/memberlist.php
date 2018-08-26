<?php require_once('includes/functions.php')?>
<?php require_once("includes/session.php")?>
<?php
//echo 
$_SESSION['uid']='CH362424120646';
	$user=array();
        $member=array();
        $uquery="select phoneno,name from userpass,userbasic where userbasic.uid=userpass.uid and userbasic.uid='".$_SESSION['uid']."' and     userpass.active=1";
	$ruser=mysqli_query($connection,$uquery);
	if($ruser)
	{
		$row=mysqli_fetch_array($ruser);$user['name']=$row['name'];$user['phoneno']=$row['phoneno'];
	}

 $superm=array();$suplist=array();
	$query="select name,entid,owner,phoneno from superm where ouid='".$_SESSION['uid']."'";
	$res=mysqli_query($connection,$query);
	if($res&&mysqli_num_rows($res)>0)
       {  while($row=mysqli_fetch_array($res))
	   {  
                array_push($superm,$row);
                array_push($suplist,$row['entid']);
                shopsearch($row['entid']);
         
	  }
       }
       else
       {
           shopsearch("uid");
       }

function shopsearch($swith)
{        global $connection;
          global $member;
          if($swith=="uid")
          { 
            $query="select name,shpid,shop_type spt,phoneno pno,addr from shopinfo where ouid='".$_SESSION['uid']."'";
	    $res=mysqli_query($connection,$query);
	    if($res)
	    {
	        while($row=mysqli_fetch_array($res))
		{      $member[$row['shpid']][0]=$row['name'];
                        $member[$row['shpid']][1]=array();
			$query2="select * from employee where empat='".$row['shpid']."'";
	                $res2=mysqli_query($connection,$query2);
                         if($res2)
	                {
	                    while($row2=mysqli_fetch_array($res2))
		           {  
	                       //array_push($member,$row2);	
                               array_push($member[$row['shpid']][1],$row2);						
		            }
                        }
                 } 
	    }
           }
           else
           {
               $query="select shpid,name,phoneno pno,addr from shopinfo where shop_type='".$swith."'";
              // echo $query;
	       $res=mysqli_query($connection,$query);
	       if($res)
	       {
	        while($row=mysqli_fetch_array($res))
		{
			if($suplist.length)
                               {   $member[$row['shpid']][0]=$row['name'];
                                    $member[$row['shpid']][1]=array();
                                    $query2="select * from employee where empat='".$row['shpid']."'";
	                            $res2=mysqli_query($connection,$query2);
                                   // echo $query2;  
                                      if($res2)
	                             {
	                                while($row2=mysqli_fetch_array($res2))
		                        {
	                                   array_push($member[$row['shpid']][1],$row2);	 	
                                          // print_r($row2);						
		                         }
                                     }

                                }
			else {  $member[$row['shpid']][0]=$row['name'];
                                    $member[$row['shpid']][1]=array();
                                    $query2="select * from employee where empat='".$row['shpid']."'";
	                            $res2=mysqli_query($connection,$query2);
                                   // echo $query2;  
                                      if($res2)
	                             {
	                                while($row2=mysqli_fetch_array($res2))
		                        {
	                                   array_push($member[$row['shpid']][1],$row2);	 	
                                          // print_r($row2);						
		                         }
                                     }

                                 }
										
		}
	       } 
           }
}

function memdisplay()
{      global $member;
        print_r($member);
        //print_r($superm);
        if(!$superm) 
        {
         foreach($member as $k=>$v)
         {
         echo '<div class="shop"><div class="shopname">'.$v[0].'</div>';
                foreach($v[1] as $va)
               {
                echo '<div class="member"><div class="membertype">'.$va['type'].'</div><div>Name:'.$va['name'].'</div><div>Ph No.:'.$va['phoneno'].'</div></div>';
                 }
               echo '<div class="member addmem"><div class="membertype" style="height:146px">ADD</div></div>
                        </div>';        
         }
        }
       else
       {
         foreach($member as $k=>$v)
         {
         echo '
                  <div class="member"><div class="membertype">'.$v[1]['type'].'</div><div>Name:'.$v[1]['name'].'</div><div>Ph No.:'.$v[1]['phoneno'].'</div></div>
                  <div class="member addmem"><div class="membertype" style="height:146px">ADD</div></div>
                  ';
         }
       }
}
//print_r($member);
?>
<html>
<head>
<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
<style>
	.member{
	        height:150px;
			width:150px;
			float:left;
			border: 2px solid;
            margin: 10px;
			

	}
	.membertype{
			width:100%;
			margin:0;
			border:0;
			background:#59E659;
			padding: 2px 0;
            text-align: center;

	}
        .shop{
			width:96%;
			float:left;
			border: 2px solid;
                        margin: 2%;
			

	}
	.shopname{
			width:100%;
			margin:0;
			border:0;
			background:#C3F3C3;
			padding: 2px 0;
                        text-align: center;

	}
        .formcon{
	       width: 92%;
		   padding: 2%;
		   margin: 4%;
		   font-size: 120%;
                   margin-bottom: 1%;
	
	}
</style>
<script type="text/javascript">
$(document).ready(function()
			{  var bta=false;
                            $(".addmemform").submit(function(e)
				{       e.preventDefault();
				         alert();
				         var sta=true;
                      
					 if(!$("input[name=phoneno]").val().length>0)
			                  {sta=false; $(this).addClass("empin");}
			                 else
				          $(this).removeClass("empin");
					
                                        if(bta)
                                         {
			                    if(!$(input[name=phoneno]).val().length>0 && !$(input[name=name]).val().length>0)
			                      {sta=false; $(input[name=phoneno]).addClass("empin");$(input[name=name]).addClass("empin");}
			                    else
				              $(this).removeClass("empin");
		         
                                         }

		            	         if(sta)
					{   
						
						$(".addmemform button").text("Checking...");
						$(".addmemform button").attr({'disabled':true});
                                                 var formD;
                                                if(bta)
						  formD={'action':'add','type':$("select[name=type]").val(),'phone':$("input[name=phoneno]").val(),'name':$("input[name=name]").val(),'password':$("input[name=password]").val()};
						else
                                                  formD={'action':'check','phone':$("input[name=phoneno]").val()};
                                                $.ajax({
						type: 'POST',
						url:'managemember.php',
						data: formD,
						datatype:'json',
						encode:true
						})
						.done(function(data)
						{
							console.log(data);
							var obj=$.parseJSON(data);
							if(obj['success']=='s')
							{      bta=true;
                                                                $(".notfound.n").show();
							        $("input[name='name']").val(obj['name']);
                                                                $("input[name='name']").attr({'disabled':true});
                                                                $(".addmemform button").text("ADD");
							        $(".addmemform button").attr({'disabled':false});
							   
							}
                                                        else if(obj['success']=='d')
							{
								$(".overlay").hide();
								bta=false;
							}
							else
							{					
								$(".notfound").show();
                                                                $(".addmemform button").text("ADD");
							        $(".addmemform button").attr({'disabled':false});
                                                                bta=true;
							}
							
						});
					}
	
				  
				});
				
				$(".addmem").click(function(){
				$(".overlay").show();
				});				
								
            });
				
</script>
</head>

<body>
<div class="overlay" style="display:none;position:fixed;width:100%;height:100%;margin: 0 auto; left:0;bottom:0; fade(#FFFFFF, 50%);">
       <div  class="formin" style="float:none;margin: 0px 20%; position: absolute; top: 20%; width: 50%;background-color: #6738D4; ">
          <form class="addmemform" >
                  <select class="formcon" name="type">
			  <option value="m">Manager</option>
			  <option value="o">Operator</option>
			  <option value="d">Delivery Boy</option>
		  </select> 
	          <input class="formcon" type="text" name="phoneno" value="" placeholder="Enter Phone No."  /><br />
		  <input class="formcon notfound n" type="text" name="name" value="" placeholder="Enter Name." style="display:none" /><br />
		  <input class="formcon notfound" type="text" name="password" value="" placeholder="Enter Password." style="display:none"   /><br />
          <button class="formcon">Done</button>
          </form>
       </div>
</div>
<?php memdisplay(); ?>

</body>
</html>