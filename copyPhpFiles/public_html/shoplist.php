<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php
	if(!isset($_SESSION['uid']))
	{
		redirect_to("login.php");
	}
	function sortof($a,$b)
	{
		return strcmp($a->officename, $b->officename);
	}		
		$ch=curl_init();
		$url="https://data.gov.in/api/datastore/resource.json?resource_id=6176ee09-3d56-4a3b-8115-21841576b2f6&api-key=b0292a46e1dd4dadef064b96229f6b9c&filters[taluk]=chennai";
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$json=curl_exec($ch);
		if(curl_errno($ch))
		{
			echo 'Curl error: ' . curl_error($ch);
		}
		curl_close($ch);
		$carr=json_decode($json);
		if($carr->success)
		{
			$places=$carr->records;
			usort($places,'sortof');
		}
?>

<html>
	<head>
		<title>SHOP LIST</title>
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
				background-image:url('./img/square.png');
				height:100px;
				background-color:#484848;
				border-bottom:1px solid #181818;
				 box-shadow: inset 0 0 15px #181818;
			}
			.banner h1
			{
				color:#fff;
			}
			.mcont
			{
				width:1050px;
			}
			.dshoplist
			{
				width:700px;
				float:left;
			}
			.dplaces
			{
				width:250px;
				float:left;
				border-right:1px solid #f0f0f0;
			}
			.placesul
			{
				padding:0px;
			}
			.placesul li
			{
				font-size:14px;
				list-style:none;
				display:block;
				width:auto;
				padding:5px;
				
			}
			.shopul li
			{
				width:200px;
				list-style:none;
				display:inline-block;
				margin:10px;
				border:1px solid #f0f0f0;
				background-color:rgba(19, 89, 135, 0.9);
				color:#fff;
			}
			.placesul li
			{
			}
			.placesul li:hover
			{
				background-color:#f0f0f0;
			}
			.dshop img
			{
				width:100%;
				background-color:floralwhite;
				box-shadow:0 2px 5px #484848;
				
			}
			.dshop,.dplaces
			{
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
			}
			.pshopaddr
			{
				font-size:12px;
				padding:5px;
				text-align:center;
			}
			.shopul
			{
				padding:0px;
			}
			.dplaces h3
			{
				color:rgba(19, 89, 135, 0.9);
			}
			.dshoplist h2
			{
				padding:5px;
				padding-left:10px;
				border-bottom:1px dashed #66ccff;
			}
			.shopnow
			{
				position:absolute;
				width:200px;
				height:100px;
				color:#484848;
				margin-top:-100px;				
				background-color:rgba(72, 72, 72, 0.9);
				display:none;
			}
			.placesul li img
			{
				width:25px;
				margin-right:10px;
				display:none;
				height:auto;
				vertical-align:middle;
			}
			.shopul li:hover>.shopnow
			{
				display:block
			}
			.shopnow button
			{
				margin-top:30px;
				width:150px;
				background-color:#fff;
				color:rgba(19, 89, 135, 1);
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
					<div class="class1050" align="left">
						<h1>Shops in MMDA, Chennai</h1>
					</div>
					
				</div>
				<div class="mcont" align="left">
					<div class="dplaces">
						<h3>Other places in Chennai</h3>
						<ul class="placesul">
							<?php
								if(!$carr->success)
								{
									echo "<h2>No places were located</h2>";
								}
								else
								{
									foreach($places as $i)
									{
										echo "<li locid=\"".$i->id."\"><img src=\"./shopimg/pointer.png\" alt=\"\" />".$i->officename."</li>";
									}
								}
							?>
						</ul>
					</div>
					<div class="dshoplist">
						<h2>Select the shop preferable for you</h2>
						<ul class="shopul">
							<a href=""><li>
								<div class="dshop">
									<img src="./shopimg/grace.png" alt="" />
									<p class="pshopaddr">
										J-138, V.P.Main Road, M.M.D.A Colony, Chennai - 106
									</p>
								</div>
								<div class="shopnow" align="center">
									<button>Shop Now</button>
								</div>
							</li></a>
							<a href=""><li>
								<div class="dshop">
									<img src="./shopimg/grace.png" alt="" />
									<p class="pshopaddr">
										J-138, V.P.Main Road, M.M.D.A Colony, Chennai - 106
									</p>
								</div>
								<div class="shopnow" align="center">
									<button>Shop Now</button>
								</div>
							</li></a>
							<a href=""><li>
								<div class="dshop">
									<img src="./shopimg/grace.png" alt="" />
									<p class="pshopaddr">
										J-138, V.P.Main Road, M.M.D.A Colony, Chennai - 106
									</p>
								</div>
								<div class="shopnow" align="center">
									<button>Shop Now</button>
								</div>
							</li></a>
							<a href=""><li>
								<div class="dshop">
									<img src="./shopimg/grace.png" alt="" />
									<p class="pshopaddr">
										J-138, V.P.Main Road, M.M.D.A Colony, Chennai - 106
									</p>
								</div>
								<div class="shopnow" align="center">
									<button>Shop Now</button>
								</div>
							</li></a>
						</ul>
					</div>
					
					
				</div>
			<?php require_once("includes/footer.php"); ?>
			</div>
			</div>		
		</body>
	</head>
</html>