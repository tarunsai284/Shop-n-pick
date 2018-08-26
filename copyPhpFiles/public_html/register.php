<?php//connection.php is included within the functions table.?>
<html>
	<head>
		<title>Shop'n'Pick</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="./javascripts/loader.js"></script>
		<link rel="shortcut icon" href="./img/favicon.png"></link>
		<link href='./css/header.css' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body
			{
				background-image:url('./img/retail1.jpg');
				margin:0px;
				background-color:rgba(19, 89, 135, 0.9);
				background-size:cover;		
			}
			body:before
			{
				content:'';
				width:100%;
				height:100%;
				position:absolute;
				background-image:url('./img/square.png');
				box-shadow:inset 0 0 500px #484848;
				top:0px;
				left:0px;
				z-index:1
			}
			.dregi
			{
				width:50%;
				background-color:rgba(255,255,255,0.8);
				box-shadow:0 0 25px #484848;
				height:50%;
				min-height:500px;
				border-radius:10px;
				margin-top:50px;
				padding-top:20px;
				padding-bottom:20px;
				position:absolute;
				z-index:2;
				margin-left:25%;
			}
			.mcontainer
			{
				width:100%;
				min-width:1050px;
			}
			.dlogo
			{
				overflow:auto;
				border-top:5px solid crimson;
				background-image:url('./img/square.png');
				background-color:#484848;
				
			}
			.dregi h1
			{
				border-top:1px dashed #66ccff;
				border-bottom:1px dashed #66ccff;
			}
			.dlogo img
			{
				width:200px;
				padding-left:20px;
				padding-right:20px;
				height:auto;
			}
			.dregi input
			{
				  font-family: 'Open Sans',verdana, sans-serif;
				  width: 300px;
				  padding: 10px;
				  border: 2px solid #484848;
				  border-radius: 5px;
				  margin-bottom: 10px;
			}
			.erri
			{
				box-shadow: 0 0 10px crimson;
			}
			   
			.fotp
			{
				display:none;
			}
			.errmsgh3
			{
				display:none;
				background-color:orange;
				color:#fff;
				padding:5px;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(".signform").submit(function(e)
				{
					e.preventDefault();
					sta=true;
					$(".reqs").each(function()
					{
						if(!$(this).val().length>0)
						{
							sta=false;
							$(this).addClass("erri");
						}
						else
						{
							$(this).removeClass("erri");
						}
					});
					if(sta)
					{
						if($("input[name=cspass]").val()==$("input[name=spass]").val())
						{
							sta=true;
							$("input[name=cspass],input[name=spass]").removeClass("erri");
						}
						else
						{
							sta=false;
							$("input[name=cspass],input[name=spass]").addClass("erri");
						}
					}
					if(sta)
					{
						
						$(".loading").fadeIn();
						$("#signbtn").text("Registering...");
						$("#signbtn").attr({'disabled':true});
						$("#signbtn").css({'cursor':'default'});
						formD={'regi':true,'name':$("input[name=name]").val(),'email':$("input[name=email]").val(),'pass':$("input[name=cspass]").val(),'phone':$("input[name=phone]").val()};
						$.ajax({
							type: 'POST',
							url:'regisup.php',
							data: formD,
							datatype:'json',
							encode:true
						})
						.done(function(data)
						{
							console.log(data);
							var obj=$.parseJSON(data);
							if(obj['go']&&obj['msgstatus'])
							{
								$(".signform,.fotp").toggle(300);
								$(".errmsgh3").slideUp();
							}
							else
							{
								$(".errmsgh3").slideDown();
								$(".errmsgh3").text(obj['reason']);
								$("#signbtn").text("Signup");
								$("#signbtn").attr({'disabled':false});
								$("#signbtn").css({'cursor':'cursor'});						
							}							
						});
						
					}
					
				});
				$(".fotp").submit(function(e)
				{
					e.preventDefault();
					if($("input[name=otp]").val().length>0)
					{
						$("#btnotp").text("Checking...");
						$("#btnotp").attr({'disabled':true});
						var formD={'otp':$("input[name=otp]").val()};
						$.ajax({
							type: 'POST',
							url:'regisup.php',
							data: formD,
							datatype:'json',
							encode:true
						})
						.done(function(data)
						{
							console.log(data);
							var obj=$.parseJSON(data);
							if(obj['otpck'])
							{	
								if(obj['acc_create_succ'])
									window.location = "http://www.snpuser.pe.hu/dashboard.php";
								else
								{
									$(".errmsgh3").text("Sorry, unable to process data");
									$(".errmsgh3").fadeIn();
								}
							}							
							else
							{
								$(".errmsgh3").text("Incorrect OTP");
								$(".errmsgh3").fadeIn();
								$("#btnotp").attr({'disabled':false});
								$("#btnotp").text("Enter the OTP");
							}	
						});
					}
					else
						$("input[name=otp]").addClass("erri");
					
				});
			});
		</script>
	</head>
	<body align="center">
		<div class="mcontainer" align="center">
			<div class="dregi">
				<div class="dlogo">
					<img src="./img/snpw.png" alt="" />
				</div>
				<h1>REGISTER</h1>
				<form action="" method="post" class="signform">
					<h3 class="errmsgh3">Sorry, unable to process your request.</h3>
					<input class="reqs" type="text" name="name" placeholder="Full name" /> <br />
					<input class="reqs"type="text" name="email" placeholder="E-mail ID for Registration" /> <br />
					<input class="reqs"type="password" name="spass" placeholder="Password" /><br />
					<input class="reqs"type="password" name="cspass" placeholder="Confirm Password" /><br />
					<input class="reqs"type="text" name="phone" placeholder="Contact number" /><br />
					<button id="signbtn" name="regi" value="regiq">Sign-Up</button>
				</form>
				<form action="#" class="fotp">
					<h3>An One Time Password has been sent to your mobile.</h3>
					<input type="text" name="otp" placeholder="Enter the OTP"/><br />
					<button id="btnotp">Enter the OTP</button>
				</form>
			</div>
		</div>
		
	</body>
</html>