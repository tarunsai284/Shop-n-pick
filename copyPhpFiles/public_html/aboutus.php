<?php require_once('includes/session.php')?>
<?php if(isset($_SESSION['uid']))$uset=true;else$uset=false;?>
<html>
<head>
	<link rel="shortcut icon" href="./img/favicon.png"></link>
	<title>About Us-Shop'n'Pick</title>
	<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
	<style type="text/css">
		body{margin:0px;background-color:#614385;background-image:url('./img/def.png');}
		header{padding:10px;}
		.class1050{width:1050px;overflow:auto;}h3{font-family:arial;font-weight:700;color:#fff;font-size:75px;}.banner,.maincnt{width:100%;min-width:1050px;}.maincnt{background-color:#614385;box-shadow:0 0 10px #484848;}
		#rect{margin-right:200px;}
		#rect.raindrop{
	width                           : 60px;
	height                          : 60px;
	position                        : absolute;
	display							: block;
	overflow						: hidden;

	background-image:url('./img/def.png');
	box-shadow:0 0 10px #000;
	border-left: 0px solid transparent;

	border-radius                   : 50px;
	-webkit-border-radius           : 50px;
	-moz-border-radius              : 50px;

	border-top-right-radius         : 0;
	-webkit-border-top-right-radius : 0;
	-moz-border-radius-topright     : 0;

	transform                       : rotate(-45deg);
	-webkit-transform               : rotate(-45deg);
	-moz-transform                  : rotate(-45deg);
	-o-transform                    : rotate(-45deg);
	-ms-transform                   : rotate(-45deg);


	transition                      : all 1s;
	-webkit-transition              : all 1s;
	-moz-transition                 : all 1s;
	-o-transition                   : all 1s;
	-ms-transition                  : all 1s;
}

.raindrop.sm {
	width                           : 60px;
	height                          : 60px;
	position                        : absolute;

	border-radius                   : 75px;
	-webkit-border-radius           : 75px;
	-moz-border-radius              : 75px;

	border-top-right-radius         : 0;
	-webkit-border-top-right-radius : 0;
	-moz-border-radius-topright     : 0;
}

.raindrop.lg {
	width                           : 100px;
	height                          : 100px;
	position                        : absolute;

	border-radius                   : 125px;
	-webkit-border-radius           : 125px;
	-moz-border-radius              : 125px;

	border-top-right-radius         : 0;
	-webkit-border-top-right-radius : 0;
	-moz-border-radius-topright     : 0;
}

#rect.raindrop:nth-child(1) /* yellow */{
	transform                       : rotate(-76deg) skewX(-12deg) skewY(-4deg);
	-webkit-transform               : rotate(-76deg) skewX(-12deg) skewY(-4deg);
	-moz-transform                  : rotate(-76deg) skewX(-12deg) skewY(-4deg);
	-o-transform                    : rotate(-76deg) skewX(-12deg) skewY(-4deg);
	-ms-transform                   : rotate(-76deg) skewX(-12deg) skewY(-4deg);
	margin-top                      : 119px;
	margin-left                     : 169px;


}
#rect.raindrop:nth-child(2)/* blue */{
	transform                       : rotate(-148deg) skewX(-12deg) skewY(-4deg);
	-webkit-transform               : rotate(-148deg) skewX(-12deg) skewY(-4deg);
	-moz-transform                  : rotate(-148deg) skewX(-12deg) skewY(-4deg);
	-o-transform                    : rotate(-148deg) skewX(-12deg) skewY(-4deg);
	-ms-transform                   : rotate(-148deg) skewX(-12deg) skewY(-4deg);
	margin-top                             : 61px;
	margin-left                            : 198px;
}
#rect.raindrop:nth-child(3)/* orange */{
	transform                       : rotate(-220deg) skewX(-12deg) skewY(-4deg);
	-webkit-transform               : rotate(-220deg) skewX(-12deg) skewY(-4deg);
	-moz-transform                  : rotate(-220deg) skewX(-12deg) skewY(-4deg);
	-o-transform                    : rotate(-220deg) skewX(-12deg) skewY(-4deg);
	-ms-transform                   : rotate(-220deg) skewX(-12deg) skewY(-4deg);
	margin-top                             : 16px;
	margin-left                            : 151px;
}
#rect.raindrop:nth-child(4)/* pink */{
	transform                       : rotate(-292deg) skewX(-12deg) skewY(-4deg);
	-webkit-transform               : rotate(-292deg) skewX(-12deg) skewY(-4deg);
	-moz-transform                  : rotate(-292deg) skewX(-12deg) skewY(-4deg);
	-o-transform                    : rotate(-292deg) skewX(-12deg) skewY(-4deg);
	-ms-transform                   : rotate(-292deg) skewX(-12deg) skewY(-4deg);
	margin-top                             : 48px;
	margin-left                            : 94px;
}
#rect.raindrop:nth-child(5)/* blue */{
	transform                       : rotate(-4deg) skewX(-12deg) skewY(-4deg);
	-webkit-transform               : rotate(-4deg) skewX(-12deg) skewY(-4deg);
	-moz-transform                  : rotate(-4deg) skewX(-12deg) skewY(-4deg);
	-o-transform                    : rotate(-4deg) skewX(-12deg) skewY(-4deg);
	-ms-transform                   : rotate(-4deg) skewX(-12deg) skewY(-4deg);
	margin-top                             : 112px;
	margin-left                            : 104px;
}
.flowercnt{float:right;background-color:transparent;width:500px;min-height:30%;margin-top:-10px;color:#fff;font-family:arial;}.flowercnt h4{font-weight:700;}.flowercnt:before{content:'';height:20px;width:500px;background-color:#f90;position:absolute;margin-top:-10px;box-shadow:0 0 50px #484848;}
.navul{padding:0px;float:right;margin:0px;}.navul li{list-style:none;display:inline-block;padding:12px 15px;border-bottom:4px solid transparent;transition:0.3s;}.navul a{color:#fff;font-size:16px;font-family:arial;font-weight:700;text-decoration:none;}.navul li:hover{border-bottom:4px solid #f90;}
h2,p,li{font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;}
.tada h2{font-size:30px;color:#fff;text-align:center;font-weight:100;}.teamdiv{background-color:#4a276e;background-image:url('./img/def.png');}
ul{padding:0px;}.howsnpul li{border-bottom:1px dashed #f90;list-style:none;margin-bottom:5px;margin-top:5px;border-radius:5px;font-weight:300;}
.teamdiv{clear:both;background-color:#fff;box-shadow:0 0 10px #484848;padding:10px;padding-bottom:25px;}#bigquest{margin-top:300px;font-size:220px;padding-bottom:10px;margin-bottom:10px;clear:both;color:#fff;text-shadow:2px 0 15px #181818;margin-left:100px;}
.teamul li img{width:146px;height:auto;border:10px solid #614385;}.teamproli{width:180px;height:291px;padding:10px;background-color:#fff;border:1px solid #ddd;}.teamdiv p{font-size:16px;}.teamul li{float:left;list-style:none;display:inline-block;margin-right:20px;}
.dfooter{background-color:#484848;padding:20px;color:#fff;background-image:url('./img/def.png');}.dfooter h3{font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif}
.werhiringdiv h3{font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;font-size:25px;color:#f90;clear:both;font-weight:300;padding:10px 15px;}
.ntlog{<?php if($uset){echo "display:none";}?>}
.ylog{<?php if(!$uset){echo "display:none";}?>}
	</style>
	<script type="text/javascript">
		/*var rotation = 0;
				jQuery.fn.rotate = function(degrees) {
					$(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
								 '-moz-transform' : 'rotate('+ degrees +'deg)',
								 '-ms-transform' : 'rotate('+ degrees +'deg)',
								 'transform' : 'rotate('+ degrees +'deg)'});
				};

				setInterval(function() {
					rotation += 1;
					$(".drops").rotate(rotation);
				},1);*/
	</script>
</head>
<body>

	<header align="center">
		<div align="center">
			<div class="class1050" align="left">
				<img src="./img/snpw2.png" alt="" />
				<ul class="navul">
					<a href="index"><li>Home</li></a>
					<a href="supermarket"><li>Supermarkets</li></a>
					<a class="ntlog" href="login?returl=aboutus"><li>Login</li></a>
					<a class="ntlog"href="register"><li>Register</li></a>
					<a class="ylog" href="dashboard"><li>Dashboard</li></a>
					<a class="ylog" href="signout?returl=aboutus"><li>Sign-Out</li></a>
				</ul>
			</div>
		</div>
	</header>
	<div class="banner" align="center">
		<div class="class1050" align="left">
			<h3>About Us</h3>
		</div>
	</div>
	<div class="maincnt"align="center">
		<div class="class1050"align="left">
		<div class="drops" style="float:left;">
			<div id="rect" class="raindrop yellow"></div>
			<div id="rect" class="raindrop"></div>
			<div id="rect" class="raindrop orange"></div>
			<div id="rect" class="raindrop pink"></div>
			<div id="rect" class="raindrop tel"></div>
			<h1 id="bigquest">?</h1>
		</div>
		<div class="flowercnt" style="">
			<h4>Everything about Shop'n'Pick</h4>
			<p>
				Shop'n'Pick is a team of professionals, who believe that world can be made a better place to shop. But along with that we believe one's best friend is that person himself. With this concept we visualised what can be done to save the <strong>Mankind</strong> from becoming fat n ugly.
				<br />
				<br />
				Here at Shop'n'Pick, we try to make your shopping experience much more simpler and better. <br /><br />
				If you look around your locals, you will see there is the Chintu Bhaiya's shop where when you go to buy something there is a candy for the kid. <br /><br />
				We just want your favourite shops to come closer to you because we believe, care can't be downloaded via internet. Rather it just require you to walk a few steps.<br /><br />
			</p>
			<h4>How Shop'n'Pick saves the Mankind?</h4>
			<ul class="howsnpul">
				<li style="">Shop'n'Pick introduced the concept of putting you in the driving seat at your home and visit your favourite shops online.</p></li>
				<li style="">We help you to get the actual prices of products and help you to make your shopping without pen n paper.</p></li>
				<li style="">Get the bill online and with 99.9% accuracy. <br /> No more waiting in queues, just keep your engine running n get your shopping done.</p></li>
				</ul>
		</div>

		<!--<div style="clear:both;">
			<ul class="hexul">
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>-->
		</div>
	</div>
	<div class="tada">
	<h2 align="center">Team Behind this awesomeness</h2>
	</div>
	<div class="teamdiv" align="center">
		<div class="class1050" align="left">
		<ul class="teamul" align="left">
			<li><div class="teamproli" align="center"><img src="./img/fbpro.jpg" alt="" /><p ><strong>Tarun Sai/strong><br /> Founder</p></div></li>
			<li><div class="teamproli" align="center"><img src="./img/monoj.jpg" alt="" /><p ><strong>Manoj Choudahry</strong><br />Co-founder</p></div></li>
			<li><div class="teamproli" align="center"><img src="./img/ali.jpg" alt="" /><p ><strong>Zanabe Ali </strong><br /> Designer</p></div></li>
			<li><div class="teamproli" align="center"><img src="./img/somesh.jpg" alt="" /><p ><strong>Somesh Dhal</strong><br /> Technical Consultant</p></div></li>
		</ul>
		<div class="werhiringdiv">
			<h3><strong>Wanna join the team?</strong><br />Mail us your resume, <a href="mailto:tarunsai284@gmail.com">Click here.</a></h3>
		</div>
		</div>
	</div>
	<div class="dfooter">
		<div class="class1050" align="center">
		<h3>&copy Copy rights reserved to Shop'n'Pick.</h3>

		</div>
	</div>
</body>
</html>
