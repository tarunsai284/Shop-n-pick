<?php require_once('includes/functions.php')?>
<?php if(!isset($mg))redirect_to("manage.php");?>
<?php
	$user=array();$uquery="select phoneno,name from userpass,userbasic where userbasic.uid=userpass.uid and userbasic.uid='".$_SESSION['uid']."' and userpass.active=1";
	$ruser=mysqli_query($connection,$uquery);
	if($ruser)
	{
		$row=mysqli_fetch_array($ruser);$user['name']=$row['name'];$user['phoneno']=$row['phoneno'];
	}
?>
<html>
	<head>
		<title>Getting started</title>
		<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
		<style type="text/css">
			button{ background: rgb(76, 142, 250); border: 0; border-radius: 2px;box-sizing: border-box;color: #fff;cursor: pointer;font-size: .875em;margin: 0;padding: 10px 24px;transition: box-shadow 200ms cubic-bezier(0.4, 0, 0.2, 1);}
			.msgdiv{padding:10px;width:400px; box-shadow:0 0 10px #484848;position:fixed;top:20%;left:20%;display:none;}.sucmsgdiv{background-color:lightgreen;color:#fff}.errmsgdiv{background-color:red;color:#fff;font-weight:bold;}
			.loaderdiv{	height:5px;width:100%;animation-duration: 4s;animation-fill-mode: forwards;animation-iteration-count: infinite;animation-name: placeHolderShimmer;	animation-timing-function: linear;background: -moz-linear-gradient(left center , #fff 0%, #fff 20%, #66ccff 40%, deepskyblue 100%) no-repeat scroll 0% 0% / 800px 104px #F6F7F8;position: fixed;top:0px;left:0px;background-size:cover;background-image: -webkit-linear-gradient(left, #fff 0%, #fff 20%, #66ccff 40%, deepskyblue 100%);-webkit-animation-duration: 3s;-webkit-animation-fill-mode: forwards;-webkit-animation-iteration-count: infinite;-webkit-animation-name: placeHolderShimmer;-webkit-animation-timing-function: linear;box-shadow:inset 0 0 2px #484848;}

				
	@-moz-keyframes placeHolderShimmer{0%{background-position:-468px 50%}100%{background-position:468px 50%}}
	@-webkit-keyframes placeHolderShimmer{0%{background-position:-468px 50%}100%{background-position:468px 50%}}}
			.cpydip{color:#fff;}
			header button{float:right;}
			button:hover {box-shadow: 0 1px 3px rgba(0, 0, 0, .50);}
			body{margin:0px;color:#484848;font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;}
			input{font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;font-weight:bold;}
			#lgdiv{width:auto;float:left;}
			.class1050{width:1050px;}
			header{min-width:1050px;padding:10px;background-color:#484848;border-bottom:2px solid #f9f9f9;overflow:auto;border-bottom:3px solid #f90;}
			header button{margin-top:10px;}
			.banner	h2
			{font-size:16px;color:#484848;font-weight:bold;line-height:20px;}
			.marg10{padding:10px;}
			.imph{padding:10px 15px;color:#f90;border:1px solid #66ccff;border-radius:3px;}
			.banner h1{margin-bottom:0px;}
			.imphblock{padding:20px;background-color:#66ccff;color:#fff;border-radius:5px;}
			.shpfooter{background-color:#484848;border-top:3px solid #f90;min-height:20px;padding:10px;}.shpfooter p{color:#fff;}
			.maincnt{min-height:100%;min-width:1050px;overflow:auto;}.bigf{font-size:120%;text-transform:uppercase;}
			.enqdiv{position:absolute;background-color:#fff;height:270px;padding:10px;padding-top:30px;width:300px;box-shadow:0 0 10px #484848;margin-left:750px;margin-top:-300px;border-radius:15px;;}
			.indexli{line-height:20px;border:1px solid #ddd;padding:5px 13px;border-radius:50%;background-color:#ddd;}
			.innernavul li{list-style:none;display:inline-block;padding:10px 15px;border:1px solid #ddd;float:left;background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);
  background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%);cursor:pointer;transition:0.3s;}.innernavul{padding:0px;padding-left:10px;}.innernavul li:hover{background:#484848;box-shadow:inset 0 0 10px #181818;color:#fff;font-weight:bold;}
			.innernavul li:first-child{border-top-left-radius:5px;border-bottom-left-radius:5px;;}.leftbar,.rightbar{float:left;width:50%;}.rightbar{float:right;}.stepul{list-style:none;padding:0px;}.stepul li{line-height:40px;}
			.innernavul li:last-child{border-top-right-radius:5px;border-bottom-right-radius:5px;;}.actliveli{border-top-left-radius: 20px;border-bottom-left-radius: 20px;margin-bottom: 5px;padding-left: 5px;background-color:#66ccff;color:#fff;border-right:3px solid deepskyblue;}
			#pgtag{color:#f90;line-height:50px;float:left;font-size:40px;padding-left:20px;}
			.dform input,.dform textarea{padding:10px;width:500px;}.actliveli .indexli{background-color:#42a2ce;border:3px solid deepskyblue;}.errin{box-shadow:0 0 10px red;}
			.repdet td{padding:10px;}.repdet thead{background-color:#f0f0f0;}.repdet{padding:10px;border:1px solid #f0f0f0;box-shadow:0 0 10px #484848;border-radius:5px;}
			
		</style>
		<script type="text/javascript">
			function msgtimmer(){setTimeout(function(){$(".msgdiv").fadeOut();},3000);}
			function proceedL(level){if(level=="step1"){$(".stp1,.stp2").toggle(100);var li=$(".actliveli").attr('indexli');$(".actliveli").removeClass("actliveli");$(".stepul li").each(function(){if($(this).attr('indexli')==(li++))$(this).addClass("actliveli");})}}
			$(document).ready(function()
			{
				$(".loaderdiv").slideUp();
				$("body").on('submit','.supermform',function(e)
				{
					e.preventDefault();
					var d=$(this).attr('rel');var sta=true;
					console.log(d);
					$("."+d+" input,textarea").each(function(){
						if(!$(this).val().length>0){
							$(this).addClass("errin");sta=false;
						}
						else
							$(this).removeClass("errin");
					});
					if(sta){
					$("."+d+" button").attr({'disabled':true});
					$("."+d+" button").text("Saving data...");
					$(".loaderdiv").slideDown();
					$.ajax
					({
						url:'shpent.php',
						type: 'POST',
						data: new FormData(this),
						processData: false,
						contentType: false					 
					})
					.done(function(data)
					{console.log("sending data");
					console.log(data);
					var obj=$.parseJSON(data);
					
					if(obj['success'])
					{
						$(".msgdiv").addClass("sucmsgdiv");$(".msgdiv").text(obj['suc_msg']);$(".msgdiv").fadeIn();$(".loaderdiv").slideUp();msgtimmer();//var level=$("."+d+" input[name=level]").val();proceedL(level);
						$("body").load("manage?action=individual");
						window.history.pushState("string", "Supermarket", "manage?action=individual");
					}
					else{$(".msgdiv").addClass("errmsgdiv");$(".msgdiv").text(obj['suc_msg']);msgtimmer();}$("."+d+" button").attr({'disabled':false});
					$("."+d+" button").text("Create");
					
					});
					}
				});
			});
		</script>
	</head>
	<body>
	<header align="center">
		<div class="" align="center">
		<div class="class1050">
			<div id="lgdiv">
				<a href="index.php"><img src="./img/snpw2.png" alt="Shop'n'Pick" /></a>
			</div><span id="pgtag">Welcome to supermarket</span>
			<span style="color:#fff;"><?php echo $name;?></span>
			<a href="signout.php"><button>Sign Out</button></a>
		</div>
		</div>		
	</header>
	<div class="maincnt marg10" align="center">
		<div class="class1050">
			<div class="repdet" align="left">
				<h3>List of supermarkets</h3>
				<table>
					<thead>
						<tr><td>Name of supermarket</td><td>Number of shops</td><td>Contact No.</td><td>Registered Address</td><td></td></tr>
					</thead>
					<?php
						$result=array();
						$query="select name,entid,regi_addr,phoneno from superm where ouid='".$_SESSION['uid']."'";
						$res=mysqli_query($connection,$query);
						if($res&&mysqli_num_rows($res)>0){while($row=mysqli_fetch_array($res))
						{
							$ecode='';$ename=explode(' ',$row['name']);foreach($ename as $i){$ecode.=$i.'_';}
							echo "<tr><td>".$row['name']."</td><td>0</td><td>".$row['phoneno']."</td><td>".$row['regi_addr']."</td><td><a href=\"manage.php?supermdet=".$row['entid']."&name=".$ecode."\"><button>Detail</button></a></td></tr>";
						}}
					?>
				</table>
			</div>
			<div class="leftbar" align="left">
				<div class="dform">
					<form action="shpent.php" method="post" rel="stp1" class="supermform stp1">
						<p class="desc"><strong>Create your supermarket.</strong><br /> Your own marketplace where you will reach your customer more easily and learn what your customers wish.Know your shop, products and about your sale.</p>
						<h3>Basic Detail</h3>
						<label for="superm">Enter Supermarket name</label><br /><br />
						<input type="text" name="superm" placeholder="please enter supermarket name" /><br /><br />
						<label for="owner">Owner name</label><br /><br />
						<input type="text" name="owner" value="<?php echo $user['name'];?>" placeholder="Owner's name please" /><br />
						<input type="hidden" name="level" value="step1"/>
						<input type="hidden" name="enttype" value="superm" />
						<br />
						<label for="panno">Owner's PAN number</label><br /><br />
						<input type="text" name="panno"/><br /><br />						
						<h3>Contact Details</h3>
						<label for="regi_mail">E-Mail ID for registration</label><br /><br />
						<input type="text" name="regi_mail" placeholder="E-mail for registration" /><br /><br />
						<label for="phoneno">Phone Number</label><br /><br />
						<input type="text" name="phoneno" value="<?php echo $user['phoneno'];?>"placeholder="Enter contact no." /><br /><br />
						<label for="regi_addr">Registered address</label><br /><br />
						<textarea name="regi_addr" id="" cols="30" rows="10"></textarea>
						<button style="margin-top:10px;">Create</button>
						<div class="loaderdiv"></div>
					</form>
				</div>
			</div>
			<div class="rightbar" align="left">
				<div class="stepup">
					<h3>Its the matter of four steps.</h3>
					<ul class="stepul">
						<li indexno="1" class="actliveli"><span class="indexli">1</span> &nbsp Create a new supermarket</li>
						<li indexno="2"><span class="indexli">2</span> &nbsp Add shops for your supermarket</li>
						<li indexno="3"><span class="indexli">3</span> &nbsp Add or Assign store manager for your individual shop</li>
						<li indexno="4"><span class="indexli">4</span> &nbsp Ting! Ting! <strong>DONE</strong> !!</li>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
	<div class="shpfooter" align="center">
		<div class="class1050" align="left">
			<p class="cpydip">&copy Copy rights reserved to Shop'n'Pick</p>
		</div>
	</div>
	<div class="msgdiv"></div>
	</body>
</html>