<html>
	<head>
		<title>Getting started</title>
		<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
		<style type="text/css">
			button
			{
				  background: rgb(76, 142, 250);
				  border: 0;
				  border-radius: 2px;
				  box-sizing: border-box;
				  color: #fff;
				  cursor: pointer;
				  font-size: .875em;
				  margin: 0;
				  padding: 10px 24px;
				  transition: box-shadow 200ms cubic-bezier(0.4, 0, 0.2, 1);
			}
			.cpydip{color:#fff;}
			header button{float:right;}
			button:hover {box-shadow: 0 1px 3px rgba(0, 0, 0, .50);}
			body{margin:0px;color:#484848;font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;}
			#lgdiv{width:auto;float:left;}
			.class1050{width:1050px;}
			header{min-width:1050px;padding:10px;background-color:#484848;border-bottom:2px solid #f9f9f9;overflow:auto;border-bottom:3px solid #f90;}
			header button{margin-top:10px;}
			.banner	h2
			{font-size:16px;color:#484848;font-weight:bold;line-height:20px;}
			.marg10{padding:10px;}
			.imph{padding:10px 15px;color:#f90;border:1px solid #66ccff;border-radius:3px;}
			.banner h1{margin-bottom:0px;}
			.sellerfeaul li{border-top-left-radius:20px;border-bottom-left-radius:20px;margin-bottom:5px;padding-left:5px;line-height:40px;list-style:none;}
			.sellerfeaul{padding:10px;}
			.sellerfeaul li:nth-child(odd){  background: -webkit-linear-gradient(45deg, #f90 0%, #fff 100%);
			  background: -o-linear-gradient(45deg, #f90 0%, #fff 100%);
			  background: -moz-linear-gradient(45deg, #f90 0%, #fff 100%);
			  background: linear-gradient(45deg, #f90 0%, #fff 100%);}
			.sellerfeaul li:nth-child(odd)>.indexli{background-color:#fff;}
			.imphblock{padding:20px;background-color:#66ccff;color:#fff;border-radius:5px;}
			.shpfooter{background-color:#484848;border-top:3px solid #f90;min-height:20px;padding:10px;}
			.maincnt{min-height:100%;min-width:1050px;overflow:auto;}.bigf{font-size:120%;text-transform:uppercase;}
			.enqdiv{position:absolute;background-color:#fff;height:270px;padding:10px;padding-top:30px;width:300px;box-shadow:0 0 10px #484848;margin-left:750px;margin-top:-300px;border-radius:15px;;}
			.indexli{line-height:20px;border:1px solid #ddd;padding:5px 13px;border-radius:50%;background-color:#ddd;}
			.innernavul li{list-style:none;display:inline-block;padding:10px 15px;border:1px solid #ddd;float:left;background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);
  background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%);cursor:pointer;transition:0.3s;}.innernavul{padding:0px;padding-left:10px;}.innernavul li:hover{background:#484848;box-shadow:inset 0 0 10px #181818;color:#fff;font-weight:bold;}
			.innernavul li:first-child{border-top-left-radius:5px;border-bottom-left-radius:5px;;}
			.innernavul li:last-child{border-top-right-radius:5px;border-bottom-right-radius:5px;;}
			.optinnerdiv:first-child{border-right:1px solid #ddd;}.optinnerdiv{width:490px;padding:10px;float:left;}.optinnerdiv h3{padding:0px;margin-top:0px;}.imppblock{padding:10px;background-color:#f90;color:#fff;border-radius:5px;line-height:20px;}
			.optinnerdiv h2{border-left:10px solid #66ccff;padding:10px;color:#fff;text-shadow:0 0 1px #ddd;background-color:lightblue;}
			
		</style>
	</head>
	<body>
	<header align="center">
		<div class="" align="center">
		<div class="class1050">
			<div id="lgdiv">
				<a href="index.php"><img src="./img/snpw2.png" alt="Shop'n'Pick" /></a>
			</div>
			<a href="signout.php"><button>Sign Out</button></a>
		</div>
		</div>		
	</header>
	<div class="maincnt marg10" align="center">
		<div class="banner">
			<div class="class1050" align="left">
				<h1>Getting started...</h1>
				<p class="imphblock">Welcome, to the Shop'n'Pick. Here you will have utmost area for your business to prosper. Select the type of shop you have got.</p>
			</div>			
		</div>
		<div class="defcnt">
			<div class="class1050" align="left">
			<div class="optdiv">
				<div class="optinnerdiv">
					<h2>Supermarket</h2>
					<p class="imppblock">
						We term supermarket for those organisations which have got more than one shops at different locations. If you have got more than one places of business, click for "Create Supermarket". Our product will help to keep a keen eye on all of your business with us; just clicks away.</p>
					<a href="manage?action=supermarket"><button class="crtsuper">Create Supermarket</button></a>
				</div>
				<div class="optinnerdiv">
					<h2>Individual shop</h2>
					<p class="imppblock">
						Got an Individual shop?<br /> Great, our service will be dedicated for your shop. Now with us, you will leave your tensions with us. Its time for your service to reach your world. <br />Reach your customer more often.</p>
					<a href="manage?action=individual"><button class="indishp">Add individual shop</button></a>
				</div>
			</div>
			<!--<ul class="innernavul">
				<li divrel="crtsuper">Create Supermarket</li>
				<li divrel="indishp">Add individual Shop</li>
			</ul>-->
			</div>
			<div class="crtsuper">
				
			</div>
			<div class="indishp">
			</div>
		</div>
	</div>
	<div class="shpfooter" align="center">
		<div class="class1050" align="left">
			<p class="cpydip">&copy Copy rights reserved to Shop'n'Pick</p>
		</div>
	</div>
	</body>
</html>