<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php
	$res=false;
	
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
		<title>Shop'n'Pick</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="./javascripts/loader.js"></script>
		<script type="text/javascript" src="./javascripts/remoteopp.js"></script>
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
			
			form h1
			{
				font-size:14px;
			}
			.numcir
			{
				padding:5px;
				
				padding-left:8.5px;
				padding-right:8.5px;
				border-radius:50%;
				color:#fff;
				background-color:rgba(19, 89, 135, 0.9);
			}
			.banner h1
			{
			}
			.flogindiv
			{
				width:30%;
				border-radius:20px;
				border:3px dashed #fff;
				float:right;
				height:220px;
				margin-top:-30px;
			}
			.flogindiv h1
			{
				line-height:30px;
				margin-top:10px;
				border-bottom:2px dashed #fff;
				font-size: 20px;
			}
			.socli div
			{
				height:50px;
				width:50px;
				background-image:url(img/conn.png);
				float:left;
			}
			.dconn
			{
				
				margin-top:30px;
			}
			.dconn 
			.dconn a img
			{
				float:left;
				width:20px;
				height:auto;
			}
			.socli button
			{
				text-transform:uppercase;
				border-radius:0;
				border-width:2px;
				transition:0.3s;
				cursor:pointer;
				background-color:transparent;
			}
			
			.socli button:hover
			{
				letter-spacing:3px;
				background-color:rgba(19, 89, 135, 0.9);
			}
			#fpid div
			{
				background-position-x:50px;
			}
			.dconn img
			{
				height:50px;
				width:auto;		
				-webkit-transition: all 0.3s ease;
				  -moz-transition: all 0.3s ease;
				  -o-transition: all 0.3s ease;
				  -ms-transition: all 0.3s ease;
				  transition: all 0.3s ease;
			}
			.dconn a
			{
				height:50px;
				width:50px;
				overflow:hidden;
			}
			.dconn a:hover> img
			{

			  transform: scale(1.2);
			  -ms-transform: scale(1.2);
			  -moz-transform: scale(1.2);
			  -webkit-transform: scale(1.2);
			  -o-transform: scale(1.2);
			}
			.flogindiv h1 span
			{
			}
			.banner h1
			{
				color:#fff;
			}
			
			#tag
			{
				font-size:20px;
				color:#fff;
			}
			.disinfo
			{
				
				width:100%;
				float:left;				
				max-height:300px;
				overflow-y:auto;
				overflow-x:hidden;
			}.disinfo h1
			{
				vertical-align:middle;
				display:none;
				width:100%;
				font-weight:300;
				font-family: 'Open Sans', sans-serif;
				font-size:24px;
				padding:0px;
				margin:0px;
				margin-top:10px;
							
			}
			.spltg
			{
				color:#66ccff;
				font-family: 'Lobster', cursive;
			}
			#h1
			{
				display:block;
			}
			.lightgrn:before
			{
				content:'';
				position:absolute;
				width:100%;
				min-width:1050px;
				background-image:url('./img/ftri.png');
				  background-image: url('./img/ftri.png');
				  /* margin: 10%; */
				  left: 0px;
				  margin-top: -15px;
				  height: 5px;
			}
			.msgbox
			{
				position:fixed;
				width:100%;
				z-index:1001;
				border:1px solid #ddd;
				background-color:rgba(72,72,72,0.9);
				top:0px;
				left:0px;
				height:100%;
				display:none;
			}
			.msgdiv
			{
				width:50%;
				margin-top:10%;
				background-color:#fff;
				border-radius:10px;
				height:50%;
				padding:10px;
			}
			.closediv
			{
				float:right;
				cursor:pointer;
				color:#484848;
				font-family: 'Open Sans', sans-serif;
				font-weight: 100;
				margin-right:10px;
				font-size:20px;
			}
			.mcontent h1,.mcontent h2
			{	
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
				color:#484848;
				border-bottom:1px dashed #33cc99;
				
			}
			.mcontent button
			{
				border:2px solid  rgba(19, 89, 135, 0.9);;
			}
			.mcontent h2
			{
				border:0px;
				width:75%;
			}
			
			.pad20
			{
				padding:20px;
			}
			.closediv:hover
			{
				color:#ef672f;
				border:2px solid #ddd;
			}
			.contwhite .class1050
			{
				padding-top:20px;
			}
			.contwhite h1
			{
				border-bottom:1px dashed #66ccff;
				font-size:30px;
			}
			.contwhite h2,.placesul li
			{
				font-family: 'Open Sans', sans-serif;
				font-weight: 300;
				
			}
			.placesul li
			{
				  list-style-image: url('./img/roc.png');
				  padding:5px;
				  display:inline-block;
				  width:300px;
				  border-bottom:1px dotted #ddd;
				  cursor:pointer
			}
			.contwhite
			{
				padding-top:25px;
				padding-bottom:25px;
			}
			.contwhite h1 img
			{
				height:30px;
				width:auto;
				vertical-align:middle;
			}
			.placesul li:hover
			{
				background-color:#f0f0f0;
			}
			.lightgrn
			{
				background-color:#33cc99;
			}
			.compdiv
			{
				width:100%;
				min-width:1050px;
				padding-top:10px;
				padding-bottom:10px;
			}
			/*.bgreen:before
			{
				  content: " ";
				  position: absolute;
				width:1050px;
				  left: 0;
				  height:260px;
				  z-index: 1001;
				  background: url(./img/flare01.png) 29% 50% repeat-x, url(./img/flare02.png) -8% 50% repeat-x, url(./img/flare03.png) -14% 50% repeat-x, url(./img/flare04.png) -65% 50% repeat-x;
			}*/
			.bgreen
			{
				
			}
			
			.bgreen fieldset
			{
				border:3px solid #f0f0f0;
				border-radius:10px;
				
			}
			.bgreen:before
			{
				content:'';
				position:absolute;
				height:200px;
				width:345px;
				background-image:url('./img/shakeh.png');
				opacity:0.5;
				margin-left:350px;
				margin-top:30px;
			}
			.bcont
			{
				width:90%;
				min-width:1010px;
				height:250px;
				
			}
			.bgreen
			{
				
				
			}
			.bgreen h2
			{
				font-weight:300;
				color:#fff;
				font-family: 'Lobster', cursive;
			}
			
		</style>
		<script type="text/javascript">
		function animateTop()
			{
					var max=7;
					var hv=$(".disinfo h1:visible").attr("hv");
					$("#h"+hv+",#i"+hv).toggle(700);
					/*$("#h"+hv).animate({"margin-top":"-40px"},200);
					$("#h"+hv).animate({"margin-top":"230px"},0);
					$("#h"+hv).hide();
					$("#h"+hv).animate({"margin-top":"230px"},0);
					$("#i"+hv).hide();
					*/
					if(hv!=max)
						hv++;
					else
						hv=1;
					/*$("#h"+hv).show();
					$("#i"+hv).fadeIn(300);
					$("#h"+hv).animate({"margin-top":"64px"},300);
					$("#h"+hv).animate({"margin-top":"75px"},100);
					setTimeout(function(){$("#h"+hv).animate({"margin-top":"-150px"},2900);},2000);*/
					$("#h"+hv+",#i"+hv).toggle(700);
			}
		
			$(document).ready(function()
			{
					setInterval(function()
				{animateTop();},5000);
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
				$( ".navul li" ).hover(
				  function() {
					var id=$(this).attr("data-div");
					var vid="#"+id;
					
					console.log(vid);
					$(vid).show();
					
				  }, function() {
					$(".navul li .subdiv").hide();
				  }
				);
				
			});
		</script>
	</head>
	<body>
		<div class="" align="center">
		<?php require_once("includes/header.php"); ?>
		<div class="maincnt">
			<div class="banner">
			<div class="class1050" align="left">
				
				<nav>			
				<div class="rootcal">
					<h1>Hi, <br />Welcome to Shop 'n' Pick</h1>
					<div class="disinfo">
						<h1 hv=1 id="h1"><span class="unlow">S'n'P just requires your <span class="spltg">pincode.</span></span></h1>
						<h1 hv=2 id="h2"><span class="unlow">Find your <span class="spltg">favourite items</span> of the list. and have <span class="spltg">EasyBuying</span></span></h1>
						<h1 hv=3 id="h3">Get the recently launched available in the local.<span class="spltg"> pencil lead </span> to <span class="spltg">Dinner Table</span>.</h1>
						<h1 hv=4 id="h4">Step 1. <span class="spltg"> Select Location</span> Step 2. <span class="spltg">Select Shop</span> Step 3. <span class="spltg">Order Online</span> Step 4. <span class="spltg">Pick Orders</span></h1>
						<h1 hv=5 id="h5">Planning for a fund raiser?  our event managers will get your <span class="spltg">Celebrity</span>.</h1>
						<h1 hv=6 id="h6">Your product needs an audience? we will help you to <span class="spltg">Promote</span>.</h1>
						<h1 hv=7 id="h7">Don't wanna miss any guest? Our planner will help you with your <span class="spltg">Guest list.</span></h1>
					</div>				
				</div>
				<div class="flogindiv" align="center">
					<h1 align="center"><span>Stay connected with us</span></h1>
					<div class="dconn" align="center">
						<a href="#" class="socli" ><img src="./img/g+.png" alt="" /></a>
						<a href="#" class="socli"><img src="./img/fbn.png" alt="" /></a><br /><br />
						<a href="register" class="socli"><button>Register</button></a>
										
					</div>
					
				</div>
				</nav>
			</div>			
			</div>
			<div class="contwhite">
				<div class="class1050" align="left">
					<h1>Getting Started &nbsp <img src="./img/roc.png" alt="" /></h1>
					<h2>STEP-1: Select the location nearest to you in Chennai.</h2>
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
									echo "<li locid=\"".$i->id."\">".$i->officename."</li>";
								}
							}
						?>
					
					</ul>
					
				</div>
			</div>
			<div class="lightgrn compdiv">
				<div class="class1050 bgreen" align="left">
					<fieldset>
						<legend align="center"><h2>Our Valuable Stores</h2></legend>
						<div class="bcont">
							
						</div>
					</fieldset>
					
				</div>
			</div>
			<?php require_once("includes/footer.php"); ?>
		</div>
		<div class="">
			
		</div>
		</div>
		<div class="msgbox" align="center">
			<div class="msgdiv">
				<!--<div class="closediv">X</div>-->
				<div class="mcontent">
					<h1>Welcome to Shop 'n' Pick</h1>
					<div class="pad20">
					<h2>Right now we are serving only in Chennai.</h2>
					<button class="closebtn" dlink="msgbox">Continue</button>
					</div>
				</div>				
			</div>
		</div>
	</body>
</html>