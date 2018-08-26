<html>
	<head>
		<title>Shop Management</title>
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
			.shpfooter{background-color:#484848;border-top:3px solid #f90;min-height:20px;padding:10px;}
			.maincnt{min-height:100%;min-width:1050px;}.bigf{font-size:120%;text-transform:uppercase;}
			.enqdiv{position:absolute;background-color:#fff;height:270px;padding:10px;padding-top:30px;width:300px;box-shadow:0 0 10px #484848;margin-left:750px;margin-top:-300px;border-radius:15px;;}
			.indexli{line-height:20px;border:1px solid #ddd;padding:5px 13px;border-radius:50%;background-color:#ddd;}
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
				<h1>Welcome to Shop Management,</h1>
				<p>Here, you can manage your shop with our advanced n yet simple and fast interface.</p>
			</div>			
		</div>
		<div class="defcnt">
			<div class="class1050" align="left">
			<h2>Why Shop'n'Pick?</h2>
			<ul class="sellerfeaul">
				<li><span class="indexli">1</span> &nbsp Manage your shop product with ease.</li>
				<li><span class="indexli">2</span> &nbsp Got more than one shop? No, problem S'n'P will be there for you.</li>
				<li><span class="indexli">3</span> &nbsp Manage your staffs for operating your shop from your office desk</li>
				<li><span class="indexli">4</span> &nbsp Manage the days of holidays for your shop.</li>
				<li><span class="indexli">5</span> &nbsp Get your monthly analytics for your shop, helping to know your customer.</li>
			</ul>
			<div class="enqdiv" align="center">
				<div id="" >
				<h3>Satisfied your guts! <br />Register your shop now. <br /> Experience Amazing!!!</h2><br />
				<a href="manage.php?action=gettingstarted"><button>Getting Started!</button></a>
				</div>
			</div>
			
			<h2>Its time for you to <span class="bigf" style="color:lightblue">GROW</span>,<br /> its time for you to <span class="bigf" style="color:gold;">CONNECT</span>, <br /> its time to level your <span class="bigf" style="color:darkorange">charts</span>,<br />
			Its time for you to <a href="manage.php?action=gettingstarted"><button>Get Started!</button></a></h2>
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