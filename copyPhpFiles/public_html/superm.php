<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php
	if(!isset($_SESSION['uid']))
	{
		redirect_to("login.php");
	}
?>

<html>
	<head>
		<title>Shop'n'Pick</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="./javascripts/loader.js"></script>
		<link rel="shortcut icon" href="./img/favicon.png"></link>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='./css/header.css' rel='stylesheet' type='text/css'>
		<link href='./css/footer.css' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body
			{
				
				margin:0px;
			}
			.class1050
			{
				width:1050px;
			}
			.banner
			{
				background-color:#f0f0f0;
				height:auto;
				padding:10px;
				background-image:none;
				border-bottom:1px solid #ddd;
				overflow:auto;
			}
			.mcont
			{
				width:1050px;
			}
			.dsplogo
			{
				float:left;
				width:500px;
				
			}
			.dsplogo img
			{
				vertical-align:middle;
				width:100%;
				height:auto;
			}
			.mcont h2
			{
				border-bottom:1px dashed deepskyblue;
				padding:10px;
				background-color:crimson;
				background-image:url('./img/square.png');
				color:#fff;
			}
			.dshoploc,.dshopfea
			{
				float:left;
				width:300px;
				padding-bottom:10px;
				background: -webkit-linear-gradient(#fff, #e8e8e8); /* For Safari 5.1 to 6.0 */
				  background: -o-linear-gradient(#fff, #e8e8e8); /* For Opera 11.1 to 12.0 */
				  background: -moz-linear-gradient(#fff, #e8e8e8); /* For Firefox 3.6 to 15 */
				  background: linear-gradient(#fff, #e8e8e8); /* Standard syntax */
			}
			.dshopfea
			{
				padding-left:20px;
				width:720px;
				float:left;
				background:none;
			}
			.dshopfea h2
			{
				background:transparent;
				color:rgba(19, 89, 135, 0.9);
			}
			.dshpreg
			{
				width:530px;
				float:right;
			}
			.dshpreg h4
			{
				margin:0px;
				font-weight:bold;
				color:rgba(19, 89, 135, 0.9);
				padding-bottom:0px;
			}
			#pregstp,p
			{
				width:300px;
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
			}
			#abtsuperm{width:auto;line-height:2;font-size:15px;}
			.ttable
			{
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
				width:100%;
			}
			.ttable tr td
			{
				padding:20px;
			}
			.ttable tr
			{
				width:100%;
			}
			.td1
			{
				width:80%;
			}
			.td2
			{
				width:20%;
			}
			
			.shlocul li
			{
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
				list-style:none;
				margin-bottom:5px;
				cursor:pointer;
				text-transform:uppercase;
				font-size:70%;
			}
			.shlocul li li
			{
				font-size:120%;
				padding:5px;
				padding-left:10px;
				color:rgba(19, 89, 135, 0.9);
				border-bottom:1px solid #f0f0f0;
				border-top:1px solid #f0f0f0;
				font-weight:bold;
			}
			.locico
			{
				width:20px;
				height:auto;
				vertical-align:middle;
				margin-right:20px;
			}
			.shlocul ul
			{
				max-height:250px;
				overflow:auto;
				padding:5px;
			}
			.shlocul
			{
				padding:0px;
			}
			.shlocul li  ul li:hover
			{
				background-color:#fff;
				border-top:1px dashed #ddd;
				border-bottom:1px dashed #ddd;
			}
			.shlocul li h4
			{
				background-color:rgba(19, 89, 135, 0.9);
				color:#fff;
				padding:10px;
				cursor:default;
			}
			.dshopfea
			{
			}
			footer
			{
				margin-top:50px;
			}
			#abtsuperm
			{
				padding-bottom:50px;
			}
			.maincnt
			{
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function()
			{
					$(".closebtn").click(function()
				{
					var dlink=$(this).attr('dlink');
					$("."+dlink).fadeOut();
				});
				$(".macc img").click(function()
				{
					if(!$(".accdiv").is(":visible"))
					{
						$(".macc").addClass("actmacc");
						$(".accdiv").slideDown();
					}
					else
					{
						setTimeout(function()
						{
							$(".macc").removeClass("actmacc");
						},350);
						$(".accdiv").slideUp(300);
					}
					
				});
				
			});
		</script>
		<body>
			<div class="" align="center">
			<?php require_once("includes/header.php"); ?>
			<div class="maincnt">
				<div class="banner">
					<div class="class1050 shop_logo" align="left">
						<div class="dsplogo">
							<img src="./shopimg/grace.png" alt="" />
						</div>
						<div class="dshpreg" align="right">
							<h4>Registered address</h4>
							<p id="pregstp">#278, N.S.K.Salai,Vadapalani, Chennai-26.Telephone : 044 - 45588818.</p>
						</div>
					</div>
					
				</div>
				<div class="mcont" align="left">
					<div class="dshoploc">
						<h2>STORE LOCATIONS</h2>
						<ul class="shlocul">
							<li>
							<h4>Chennai</h4>
							<ul>
								<li><img class="locico" src="./shopimg/pointer.png" alt="" />MMDA</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />VALASARAVAKKAM</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />KAMARAJ SALAI</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />ALWARTHIRUNAGAR</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />ASHOK PILLAR</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />K.K NAGAR</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />KODAMBAKKAM</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />PORUR</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />RAMAPURAM</li>
								<li><img class="locico"src="./shopimg/pointer.png" alt="" />VILLIVAKKAM</li>
							</ul>
							</li>
						</ul>
					</div>
					<div class="dshopfea">
						<h2>About Grace Supermarket</h2>
						<p id="abtsuperm">
							Grace Supermarket began with one store in 1999 by Mr. M. Selvaraj Nadar in Vadapalani, Chennai. Wayback Mr Selvaraj Nadar started his provision store in 1975 and after 27 years he started the first supermarket in Vadapalani Chennai. He always believed in the value of hard work and the importance of taking care of people. And he has always dreamed big and today there are 11 outlets in various parts of Chennai. Now Mr. S. Rajkumar, the Managing Director has been managing the whole supermarket business. Vadapalani and Kilpauk outlet has been made dedicative for selling of the Fruits and Vegetables where as all other outlets have the groceries items.

Grace Supermarket offer Customers the best service and sell only the freshest, safest products. Moreover, we always look for great products for today and tomorrow, and make sure to give Customers low prices with the best value. Grace Supermarket hire great people who love what they do and are good at it. The relationships they build with our customers are an important part of why they keep coming back to shop with us.

We operate under nearly a dozen outlets, all of which share the same belief in building strong local ties and brand loyalty with our customers.

Supermarkets are our core business. We provide our customers with the best possible value, assortment and shopping experience our future looks bright as we continue to grow and expand while finding practical yet innovative ways to service our customers. Most of all, we continue to perfect daily the things that we were built on..quality and service."
						</p>
					</div>
				</div>
			<?php require_once("includes/footer.php"); ?>
			</div>
			</div>		
		</body>
	</head>
</html>