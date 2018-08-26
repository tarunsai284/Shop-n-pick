<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php
	if(isset($_SESSION['uid']))
	{
		$account=getDet($_SESSION['uid'],$connection,"basic");
	}
	else
		redirect_to("index.php");
?>
<html>
	<head>
		<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
		<link href='./css/footer.css' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="./img/favicon.png"></link>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
		
		<title>Dashboard::S'n'P</title>
		<style type="text/css">
			header
			{
				box-shadow:0 0 15px #484848;
				width:100%;
				min-width:1050px;
				background-color:rgb(19, 89, 135);
				border-top:5px solid #f90;
				overflow:auto;
			}
			.dlogo
			{
				height:50px;
				padding-left:20px;
				padding-right:20px;
				
			}
			#lgdiv
			{
				width:auto;
				float:left;
			}
			.navbar
			{
				float:left;
				width:auto;
				margin-left:30px;
			}
			.navbarul
			{
				padding:0px;
				list-style:none;
			}
			.navbarul li
			{
				cursor:pointer;
				display:inline-block;
				padding:5px 15px;
				font-family:verdana,sans-serif;
				color:#ddd;
				text-transform:uppercase;
				font-size:12px;			
			}
			.navbarul li:hover
			{
				color:#f90;
			}
			#offbtn
			{
				cursor:pointer;
				padding:12px 15px;
				border:none;
				border-radius:5px;
				color:#fff;
				border-bottom:3px solid #3cb18a;
				background-color:#33cc99;
			}
			.navbarul li a
			{
				color:#fff;
			}
			.navbarul ul
			{
				display:none;
			}
			#logo
			{
				vertical-align:middle;
				margin-top:10px;
				width:auto;
				height:50px;
				padding-left:20px;
				float:lefy;
			}
			body
			{
				margin:0px;
				background-color:#e8e8e8;
			}
			.class1050
			{
				width:1050px;
			}
			.maincnt
			{
				margin-top:5px;
			}
			.whitebg
			{
				border-bottom:10px solid #f90;
				overflow:auto;
				background-color:#fff;
				height:auto;
				min-height:600px;	
				box-shadow:0 0 10px #ddd;
			}
			.leftbar
			{
				background-color:#f0f0f0;
				width:225px;
				border-right:1px solid #ddd;
				border-left:1px solid #ddd;
				min-height:560px;
				float:left;
			}
			.weldiv h1,.weldiv h3,h4
			{				
				padding:10px;
				font-weight:400;
				color:#fff;
				margin:10px;
			}
			.weldiv
			{
				background-color:#009bdc;
				background: linear-gradient(top, deepskyblue 0%, skyblue 100%);
				  background: -moz-linear-gradient(top, deepskyblue 0%, skyblue 100%);
				  background: -webkit-linear-gradient(top, deepskyblue 0%,skyblue 100%);
				padding:10px;
				padding-bottom:10px;
			}
			.weldiv h1
			{
				background-color:rgb(19, 89, 135);
				color:#fff;
				text-shadow:0 -1px 3px #484848;
			}
			.weldiv h3
			{
				font-family:verdana,arial;
				background-color:#008bc6;
			}
			.rightbar
			{
				width:775px;
				padding-left:10px;
				padding-right:10px;
				float:left;
			}
			.offerdiv
			{
				padding:10px;
				width:755px;
				min-height:50px;
				background-color:skyblue;
				
				border-bottom:20px solid lightgreen;
			}
			.drooftop
			{
				height:44px;
			}
			.drooftop:after
			{
				content: '';
				  height: 20px;
				  width: 735px;
				  margin-left:-367px;
				  position: absolute;
				  margin-top:-10px;
				  background-image: url('img/borderbtm.png');
			}
			.offerdiv h4:before
			{
			      border-bottom-color: rgba(0, 0, 0, 0);
			  border-bottom-style: solid;
			  border-bottom-width: 30px;
			  border-left-color: skyblue;
			  border-left-style: solid;
			  border-left-width: 22px;
			  border-top-color: rgba(0, 0, 0, 0);
			  border-top-style: solid;
			  border-top-width: 0px;
			  box-sizing: border-box;
			  display: block;
			  height: 50px;
			  position: absolute;
			  width: 40px;
			  margin-top: -15px;
			  margin-left: -10px;
			  content: '';
			}
			.offerdiv h4:after
			{
			   border-bottom-color: rgba(0, 0, 0, 0);
			  border-bottom-style: solid;
			  border-bottom-width: 30px;
			  border-right-color: skyblue;
			  border-right-style: solid;
			  border-right-width: 40px;
			  border-top-color: rgba(0, 0, 0, 0);
			  border-top-style: solid;
			  border-top-width: 0px;
			  box-sizing: border-box;
			  display: block;
			  height: 50px;
			  height: 44px;
			  position: absolute;
			  width: 40px;
			  margin-top: -42px;
			  margin-left: 685px;
			  content: '';
			  background-color: crimson;
			}
			.offerdiv h4
			{	
				font-size:20px;
				background-color:crimson;
				text-shadow:0 0 2px #484848;
				font-weight:400;
				color:#fff;
				text-transform:capitalize;
				border-top:5px solid #f90;
				height:25px;
			}
			
			
			.offerul
			{
				padding:0px;
			}
			.offerul li
			{
				height:120px;
				width:30%;
				border:2px dashed #fff;
				display:inline-block;				
			}
			.silitlodiv
			{
				width:225px;
				clear:both;
				padding-bottom:10px;
				padding-top:20px;
				margin-top:0px;
				background: -webkit-linear-gradient(45deg, #274E70 0%, #2095B2 100%); /* For Safari 5.1 to 6.0 */
				background: -o-linear-gradient(45deg, #274E70 0%, #2095B2 100%); /* For Opera 11.1 to 12.0 */
				background: -moz-linear-gradient(45deg, #274E70 0%, #2095B2 100%); /* For Firefox 3.6 to 15 */
				background: linear-gradient(45deg, #274E70 0%, #2095B2 100%); /* Standard syntax (must be last) */
			
			}
			
			.silitlodiv img
			{
				box-shadow:0 0 35px #ddd;
				width:75px;
				height:auto;
				border-radius:37.5px;
			}
			header img
			{
			}
			.silefdiv
			{
				background-color:#f0f0f0;
			}
			hr
			{
				background-color:#66ccff;
			}
			.breaker
			{
				border-bottom:1px solid #f0f0f0;
			}
			.silefdiv ul
			{
				width:100%;
				list-style:none;
				text-transform:uppercase;
				font-family:impact,verdana,arial,sans-serif;
				font-weight:400;
				color:#484848;
				padding:0px;
				text-align:left;
				
			}
			.silefdiv li
			{
				transition:0.3s;
				cursor:pointer;
				border-top: 1px solid #e2e2e2!important;
				padding:12px 15px;
				line-height:2;
				font-size:14px;
			}
			
			.outerul li:hover>.headli
			{
				
			}
			.outerul li:hover
			{
				background-color:#ddd;
				color:rgb(19, 89, 135);
			}
			.innerul
			{
				padding:0px;
				margin:0px;
				box-shadow:inset 0 0 5px #ddd;
			}
			.innerul li
			{
				font-family:verdana,sans-serif;
				font-size:10px;
			}
			
			.innerul li:hover
			{
				background-color:#f0f0f0;
				box-shadow:inset 0 0 5px #484848;
			}
			.outerul li:hover>.submenu
			{
				visibility:visible;
				display:block;
			}
			.submenu
			{
				display:none;
				width:100%;
				background-color:#fff;
				box-shadow:inset 0 0 10px #484848;
				transition:0.3s;
			}
			.headli
			{	
			}
			#logodiv,#namediv
			{
				clear:both;
				width:100%;
			}
			#nameh3
			{
				font-size:14px;
				clear:both;
				font-weight:300;
				font-family:verdana,arial;
				color:rgb(255, 255, 255);
				margin-bottom:0px;
			}
			.dipdiv
			{
				display:block !important;
			}
			.activeinli
			{
				background-color:#f90;
				box-shadow:inset 0 0 5px #484848;
			}
			.activeinli:hover
			{
				background-color:#f90 !important;
			}
			.footdiv
			{
				padding: 15px 0px 15px;
				font-size: 12px;
				background-color:rgb(19, 89, 135);
				color:#fff;
				font-family:monospace,verdana,arial;
				font-weight:300;
			}
			h1,h2,h3,h4
			{
				font-family: 'Open Sans',verdana, sans-serif;
				color:#484848;
				font-weight:300;
			}
			.inidiv
			{
				
			}
			.riaccdiv,.rightouterdiv
			{
				padding:10px;
				display:none;
			}
			.rih1
			{
				margin:0px;
				margin-bottom:10px;
			}
			.divh3
			{
				background-color:#eee;
				padding:5px;
			}
			.profiledescul
			{
				padding-left:20px;
				list-style:none;
				margin-top: 5px;
				margin-bottom: 5px;
				text-align:left;
			}
			.pronameli
			{
				text-align:center;
			}
			.profiledescul
			{
				font-size:12px;
				margin-top:5px;
				color:#fff;
				font-family:'Open Sans',verdana, sans-serif;
			}
			.proloc
			{
				text-transform:capitalize;
			}
			.profiledescul li i
			{
				color:#f90;
			}
			.navh3
			{
				cursor:pointer;
				color:#fff;
				background-color:#eee;
				font-size:14px;
				padding-left:20px;
				text-transform: uppercase;
				border-top:3px solid #f90;
				padding-top:10px;
				padding-bottom:10px;
				font-family:'Open Sans',verdana, sans-serif;
				font-weight:300;
				color:#484848;
				text-shadow:inset 0 0 1px #484848;
	
			}
			.navh3:hover
			{
				background-color:#ddd;
			}
			/*
				  background: -webkit-linear-gradient(#fff, #999);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
			*/
			form
			{
				
			}
			button
			{
				font-family:'Open Sans',verdana, sans-serif;
				padding:5px 15px;
				min-width:100px;
				background-color:rgb(19, 89, 135);
				border:none;
				color:#fff;
				font-weight:bold;
				cursor:pointer;
				border-bottom:5px solid #f90;
				transition:0.3s;
			}
			button:hover
			{
				border-bottom-width:7px;
				border-bottom-color:crimson;
			}
			input
			{	
				padding:10px;
				width:60%;
				min-width:200px;
				margin-bottom:20px;
			}
			.locatediv
			{
				width:100%;
				height:100%;
				top:0px;
				left:0px;
				position:fixed;
				background-color:rgba(72,72,72,0.5);
				z-index:1000;
				<?php if($account['found']&&($account['locid']!=null))echo "display:none;";?>
			}
			.inlocate
			{
				width:50%;
				min-width:400px;
				border-radius:10px;
				position:fixed;
				top:10%;
				left:24%;
				background-color:#fff;
				border:1px solid #f0f0f0;
				z-index:1001;
				padding:20px;				
			}
			.inlocate input[type=text]
			{
				margin-bottom:0px;
				color:rgb(19, 89, 135);
				font-weight:700;
			}
			#myadddiv i
			{
				font-size:25px;
				color:skyblue;
				margin-right:10px;
			}
			.locatediv button
			{
				display:inline-block;
				padding:10px 20px;
				color:#fff;
				font:normal 700 16px/1 "Calibri", sans-serif;
				text-align:center;
				text-shadow:0 -1px 1px green;
				border-radius:5px;
				border-bottom: 3px solid #3cb18a;
				background-color: #33cc99;
			}
			.locatediv button i
			{
				display:none;
			}
			.closediv
			{
				float:right;
				font-size:120%;
				color:#f90;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function()
			{						
				$(".innerul li").click(function()
				{
					//$(this).velocity("transiiton.expandIn");
					var rdiv=$(this).attr('rootdiv');
					if(!$(this).is(".activeinli"))
					{
						$(".activeinli").removeClass("activeinli");
						$(this).addClass("activeinli");
						var info={'opendiv':$(this).attr('opendiv'),'innerdiv':$(this).attr('innerdiv')};
						if(!$("."+info['opendiv']).is(":visible"))
						{
							$(".rightbar div").slideUp();
							$("."+info['opendiv']+",."+info['innerdiv']).slideDown();
						}
						else if(!$("."+info['innerdiv']).is(":visible"))
						{
							$("."+info['opendiv']+" div").slideUp();
							$("."+info['innerdiv']+",."+info['innerdiv']+" .beforeotp").slideDown();
						}
					}
					if(!$("."+rdiv).is(".dipdiv"))
					{
						$(".dipdiv").removeClass("dipdiv");
						$("."+rdiv).addClass("dipdiv");
					}
					
				});
				$(document).on("click",".navh3",function()
				{
					var refli=$(this).attr('refli');
					$("."+refli).click();
				});
				$("#offbtn").click(function(e)
				{	
					e.preventDefault();
					var stateObj = { foo: "bar" };
					history.pushState(stateObj, "page 2", "bar.html");
				});
				$(".openlocatediv").click(function()
				{
					$(".locatediv").fadeIn();
				});
				$(".closediv").click(function()
				{
					var rel=$(this).attr('rel');
					$("."+rel).fadeOut();
				});
				$(".changeform").submit(function(e)
				{
					var sta=true;
					e.preventDefault();
					var act=$(this).attr("act");var formD={};
					if(act=="cgpass")
					{
						$(".cgpassform input").each(function()
						{if(!$(this).val().length>0){sta=false; $(this).addClass("errinp");}});
						if($(".cgpassform input[name=newpass]").val()!=$(".cgpassform input[name=cnewpass]").val())
						{	$(".cgpassform input[name=newpass],.cgpassform input[name=cnewpass]").addClass("errinp");alert("Both the new passwords didn't match");sta=false;}
						if(sta)formD={'action':'cgpass','oldpass':$(".cgpassform input[name=oldpass]").val(),'newpass':$(".cgpassform input[name=newpass]").val(),'cnewpass':$(".cgpassform input[name=cnewpass]").val()};
					}
					else if(act=="cgmail")
					{
						$(".cgmailform input").each(function()
						{if(!$(this).val().length>0){sta=false; $(this).addClass("errinp");}});
						if(sta)formD={'action':'cgmail','password':$(".cgmailform input[name=password]").val(),'newmail':$(".cgmailform input[name=newmail]").val()};
					}
					else if(act=="cgphone")
					{
						$(".cgphoneform input").each(function()
						{if(!$(this).val().length>0){sta=false; $(this).addClass("errinp");}});
						if(sta)formD={'action':'cgphone','password':$(".cgphoneform input[name=password]").val(),'newphone':$(".cgphoneform input[name=newphone]").val()};
					}
					//------init form processing over
					if(sta)
					{
						$(this).children("button").text("Saving...");
						$.ajax({
						type: 'POST',
						url:'changesup.php',
						data: formD,
						datatype:'json',
						encode:true
						})
						.done(function(data)
						{
							console.log(data);
							var obj=$.parseJSON(data);
						});
					}
				});
			});
		</script>
	</head>
	<body>
		<header align="center">
			<div align="center">
			<div class="class1050" align="left">
				<div id="lgdiv">
					<a href="index"><img id="logo" src="./img/snpw2.png" alt="" /></a>
				</div>
				<div class="navbar">
					<ul class="navbarul">
						<a href="index"><li><i class="fa fa-home"></i>&nbsp Home</li></a>
						<li class="openlocatediv"><i class="fa fa-map-marker"></i>&nbsp Location</li>
						<a href="manage"><li><button>Manage Shops</button></li></a>
						<a href="signout"><li><button>Log off</button></li></a>
					</ul>
				</div>				
			</div>
			</div>
		</header>
		<div class="maincnt " align="center">
			<div class="class1050 whitebg" align="left">
				<div class="leftbar">
					<div class="silitlodiv" align="center">
						<div id="logodiv">
							<img src="./img/default.png" alt="" />
						</div>
						<div id="namediv">
							<h3 id="nameh3"><?php if($account['found'])echo $account['name']?></h3>
							<ul class="profiledescul">
								<li id="promail"><i class="fa fa-envelope"></i>&nbsp &nbsp <span id="promailval"><?php if($account['found'])echo $account['email']?></span></li>
								<li id="prophone"><i class="fa fa-phone"></i>&nbsp &nbsp &nbsp<span id="prophoneval"><?php if($account['found'])echo $account['phoneno']?></span></li>
								<li id="proloc"><i class="fa fa-map-marker"></i>&nbsp &nbsp &nbsp<span id="prolocval"><?php if($account['found']){if($account['locaddr']!=null){echo $account['locaddr'];}else{ echo "<a class=\"locsetlink\"href=\"#\">Set your location</a>";}}?></span></li>
							</ul>
						</div>
					</div>
					<div class="silefdiv">
						<ul class="outerul">
							<li class="" data-rel="dacc"><i class="fa fa-user"></i>&nbsp &nbsp <span class="headli">Account</span>
								<div class="submenu dacc">
									<ul class="innerul">
										<li rootdiv="dacc"class="passcgli"opendiv="accsetdiv" innerdiv="cgpassdiv"><i class="fa fa-asterisk"></i><i class="fa fa-pencil"></i>&nbsp Change password</li>
										<li rootdiv="dacc"class="mailcgli"opendiv="accsetdiv" innerdiv="cgmaildiv"><i class="fa fa-envelope"></i>&nbsp &nbsp change email ID </li>
										<li rootdiv="dacc"class="phonecgli"opendiv="accsetdiv" innerdiv="cgphonediv"><i class="fa fa-phone"></i>&nbsp &nbsp change phone number</li>
									</ul>
								</div>
							</li>
							<li class="" data-rel="dtran"><i class="fa fa-inr"></i>&nbsp &nbsp <span class="headli">Transaction</span>
								<div class="submenu dtran">
									<ul class="innerul">
										<li rootdiv="dtran"class="pendingtranli"opendiv="transacdiv" innerdiv="pendingtrandiv"><i class="fa fa-exchange"></i>&nbsp &nbsp Pending requests</li>
										<li rootdiv="dtran"class="lasttentranli"opendiv="transacdiv" innerdiv="lasttentrandiv"><i class="fa fa-book"></i>&nbsp &nbsp last 10 transactions</li>										
									</ul>
								</div>
							</li>
							<li class=""data-rel="dshop"><i class="fa fa-building"></i>&nbsp &nbsp <span class="headli">Shops</span>
								<div class="submenu dshop">
									<ul class="innerul">
										<li rootdiv="dshop"class="favoshpli"opendiv="shopdiv" innerdiv="favoshopdiv"><i class="fa fa-heart"></i>&nbsp &nbsp your Favourite shops</li>
										<li rootdiv="dshop"class="locashopli"opendiv="shopdiv" innerdiv="locateshopdiv"><i class="fa fa-location-arrow"></i>&nbsp &nbsp Locate shops</li>										
									</ul>
								</div>
							</li>
							<li class=""data-rel="dloc"><i class="fa fa-compass"></i>&nbsp &nbsp <span class="headli">location</span>
								<div class="submenu dloc">
									<ul class="innerul">
										<li rootdiv="dloc"><i class="fa fa-street-view"></i>&nbsp &nbsp edit location</li>
									</ul>
								</div>
							</li>
						</ul>						
					</div>
				</div>
				<div class="rightbar">
					<div class="inidiv">
						<div class="weldiv">
							<h1>Welcome Aboard!!! <i class="fa fa-rocket"></i></h1>
							<h3>Experience the amazing!</h3>												
						</div>
						<div class="offerdiv" align="center">
							<div class="drooftop">
								<h4><i class="fa fa-star"></i>&nbsp&nbsp offers tailored for you &nbsp&nbsp<i class="fa fa-star"></i></h4>
							</div>
							<ul class="offerul">
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
							<a href="offers.php"><button id="offbtn">View all</button></a>
						</div>
					</div>
					<div class="riaccdiv accsetdiv rightouterdiv">
						<h1 class="rih1"><i class="fa fa-user"></i>&nbsp &nbsp Account Settings</h1>
						<h3 class="divh3 navh3"opendiv="accsetdiv" refli="passcgli"innerdiv="cgpassdiv"><i class="fa fa-asterisk"></i><i class="fa fa-pencil">&nbsp </i>Change Password</h3>
						<div class="rightinnerdiv cgpassdiv">
							<form class="cgpassform changeform" act="cgpass" refdiv="cgpassdiv" init="cgpass" action="#">
								<input type="password" name="oldpass" placeholder="Old Password"/> <br />
								<input type="password" name="newpass" placeholder="New Password"/> <br />
								<input type="password" name="cnewpass" placeholder="Confirm Password"/> <br />
								<button>Save</button>
							</form>
						</div>
						<h3 class="divh3 navh3" opendiv="accsetdiv" refli="mailcgli"innerdiv="cgmaildiv"><i class="fa fa-envelope"></i> &nbsp Change E-mail ID</h3>
						<div class="rightinnerdiv cgmaildiv">
							<form class="cgmailform changeform" act="cgmail" refdiv="cgmaildiv" init="cgmail"action="#">
								<input type="text" name="newmail" placeholder="New E-mail ID"/> <br />
								<input type="text" name="password" placeholder="Password"/> <br />
								<button>Save</button>
							</form>
						</div>
						<h3 class="divh3 navh3" opendiv="accsetdiv" refli="phonecgli"innerdiv="cgphonediv"><i class="fa fa-phone"></i> &nbsp Change Phone Number</h3>
						<div class="rightinnerdiv cgphonediv">
							<div class="beforeotp">
							<form class="cgphoneform changeform" act="cgphone" refdiv="cgphonediv" init="cgphone"action="#">
								<input type="text" name="newphone" placeholder="New phone number" />
								<input type="password" name="password" placeholder="Password"/> <br />
								<button>Go</button>
							</form>
							</div>
							<div class="afterotp">
								<form class="otpform" act="confotp" action="#">
								<h4>An One-Time Password has been sent to your new number.</h4>
								<input type="text" name="otpcon" placeholder="Enter OTP" /><br />
								<button>Done</button>
							</form>
							
							</div>
						</div>						
					</div>
					<div class="riaccdiv transacdiv rightouterdiv">
						<h1 class="rih1"><i class="fa fa-inr"></i>&nbsp Transactions</h1>
						<h3 class="divh3 navh3"opendiv="transacdiv" refli="pendingtranli"innerdiv="pendingtrandiv"><i class="fa fa-exchange"></i>&nbsp &nbsp </i>Pending Transactions</h3>
						<div class="rightinnerdiv pendingtrandiv">
							
						</div>
						<h3 class="divh3 navh3" opendiv="transacdiv" refli="lasttentranli"innerdiv="cgmaildiv"><i class="fa fa-book"></i> &nbsp last ten transactions</h3>
						<div class="rightinnerdiv lasttentrandiv">
							
						</div>						
					</div>
					<div class="riaccdiv shopdiv rightouterdiv">
						<h1 class="rih1"><i class="fa fa-building"></i>&nbsp SHOPS</h1>
						<h3 class="divh3 navh3"opendiv="shopdiv" refli="favoshpli"innerdiv="favoshopdiv"><i class="fa fa-heart"></i>&nbsp &nbsp </i>Favourite Shops</h3>
						<div class="rightinnerdiv favoshopdiv">
							
						</div>
						<h3 class="divh3 navh3" opendiv="shopdiv" refli="locashopli"innerdiv="locateshopdiv"><i class="fa fa-location-arrow"></i> &nbsp Locate shops</h3>
						<div class="rightinnerdiv locateshopdiv">
							
						</div>						
					</div>
				</div>
							
			</div>
				<div class="footdiv class1050" >
					&copy 2015 Shop'n'Pick India. All rights reserved.
				</div>		
			</div>
		<div class="locatediv">
			<div class="inlocate" align="center">
			<h1>Enter your preferred location <div rel="locatediv" class="closediv"><i class="fa fa-minus"></i></div></h1>
			<form class="locform"action="#">
				<div id="myadddiv">
					<i class="fa fa-map-marker"></i><input type="text" id="my-address"  placeholder="Location"/>
				</div>
				<input type="hidden" id="address" autocomplete="off" name="address">
				<input type="hidden" id="latitude" autocomplete="off" name="latitude">
				<input type="hidden" id="longitude" autocomplete="off" name="longitude"><br />
				<button id="locsavebtn"><i class="fa fa-check"></i>&nbsp  Save</button>
			</form>
			</div>
			<script type="text/javascript">
		$(document).ready(function()
		{
			$('#my-address').keypress(function(e) {
			if (e.which == 13) {
				codeAddress();
			}
			});
			$("body").on('click',"#locsavebtn",function(e)
			{
				e.preventDefault();
				var sta=true;
				$(".locform input[type=\"hidden\"]").each(function()
				{
					if(!$(this).val().length>0)
						sta=false;
				});
				if(sta)
				{
					$("#locsavebtn").text("Saving...");
					var formD={'action':'cgloc','lat':$("#latitude").val(),'long':$("#longitude").val(),'addr':$("#address").val()};
					$.ajax({
					type: 'POST',
					url:'locsup.php',
					data: formD,
					datatype:'json',
					encode:true
					})
					.done(function(data)
					{
						console.log(data);
						var obj=$.parseJSON(data);
						if(obj['success'])
						{
							$("#locsavebtn").text("Save");
							$(".locatediv").fadeOut();
							$("#prolocval").html($("#address").val());
						}	
						else
						{
							$(".locform").append("<h3 class=\"errmsgh3\">Unable to change your location</h3>");
						}	
					});
					
				}
			});
		});
	</script>
	<script type="text/javascript">
		var countryRestrict = { 'country': 'in' };
function initializeAdd() {
        var address = (document.getElementById('my-address'));
        var autocomplete = new google.maps.places.Autocomplete(address,{
        types: [],
        componentRestrictions: countryRestrict
      });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
        setTimeout(codeAddress, 500);
      });
}
function codeAddress() {
	geocoder = new google.maps.Geocoder();
	var address = document.getElementById("my-address").value;    
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
			document.getElementById("address").value = document.getElementById('my-address').value;
			document.getElementById("latitude").value = results[0].geometry.location.lat();
			document.getElementById("longitude").value = results[0].geometry.location.lng();
			console.log(results);
			
			var address = document.getElementById("address").value;
			var lat = document.getElementById("latitude").value;
			var lng = document.getElementById("longitude").value;
			
			var pageurl=document.getElementById('pageurl').value;
			/*var pathurl = pageurl+'Customers/chkloc_available';
			$.post(pathurl,{'search_keyword':address,'lat':lat,'lng':lng},function(data){
				if(data){
					var res = data.split('-');
					if(res[0] == 'msg'){
						$("#my-address").val('');
						alert(res[1]);
						//window.location.href=pageurl+'Partners/partner/';
						window.location.href;
					}else{
					  document.getElementById('searchfrm').submit();
					}
				}
			});*/
	  }
	  else {
		 var msg="Please enter a valid location.";
		 showMsg('err',msg);
		  i=0;
		  msg='';
		  return false;
		 setTimeout('removeMsg()',7000);
	  }
	});
}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', initializeAdd);
	</script>
	<script type="text/javascript">var showButton = true;</script>
	<script type="text/javascript">var apiKey = "AIzaSyDsKKpGm6PevT7qnUbazy2kSbSPmxxQFtY";</script>
		</div>
				
	</body>
</html>