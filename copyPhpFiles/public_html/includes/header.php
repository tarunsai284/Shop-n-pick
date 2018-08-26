<?php
	$acc=array();
	$acc['loggedin']=false;
	if(isset($_SESSION['uid']))
	{
		$query="select name from userbasic where userbasic.uid='".$_SESSION['uid']."'";
		$res=mysqli_query($connection,$query);
		if($res)
		{
			$row=mysqli_fetch_array($res);
			$acc['loggedin']=true;
			$acc['name']=$row['name'];
		}
		
	}
	$catstr="";
	if(file_exists("json/category1.json"))
	{
		$result['success']=true;
			$string = file_get_contents("json/category1.json");
			$json = json_decode($string, true);
			foreach($json as $i)
			{				
				if(isset($i['sub']))
				{
					$catstr.= "<li class=\"root\" data-div=\"".$i['code']."\">".$i['name']."<div align=\"center\" id=\"".$i['code']."\" class=\"subdiv\">";
					$catstr.="<div class=\"class1050\" align=\"left\"><ul>";
					foreach($i['sub'] as $j)
					{	
						
						if(isset($j['usub']))
						{
							$catstr.= "<li class=\"usubli\"><h4 class=\"subh4\">".$j['name']."</h4><ul class=\"usubul\">";
							foreach($j['usub'] as $k)
							{
								$catstr.= "<li>".$k['name']."</li>";
							}
							$catstr.= "</ul></li>";
						}
						else
							$catstr.= "<li class=\"usubli\"><h4 class=\"subh4\">".$j['name']."</h4></li>";
					}
					$catstr.="</ul></div>";
					$catstr.= "";
				}
				else
					$catstr.= "<li class=\"root\">".$i['name']."</li>";
					
			}	
		
	}
	else
		echo "Errrrrr...";
?>

<div class="header fixedhead" align="">
			<div class="class1050" align="left">
				<div class="img_tg">
					<a href="index"><img id="logo"src="./img/snpw.png" alt="" /></a>
					
				</div>
				<div class="searchdiv">
					<form action="search.php">
						<input type="text"name="searchbx" id="seabox"placeholder="Search,for as need."/>
						<select name="cate" id="">
							<option value="">Categories</option>
							<option value="Groceries">Groceries</option>
							<option value="cookacc">Cooking accessories</option>
							<option value="homeapp">Home appliances</option>
							<option value="books">Books</option>
						</select>
						<input type="submit" name="seabtn" value="search" />
					</form>					
				</div>
				<div class="shopdiv">
					<img src="./img/bag.png" alt="" />
					<h1 id="cartnum">00</h1>
				</div>
				<div class="macc" align="center">
					<img src="./img/default.png" alt="" /><br />
					<div class="accdiv">
						<form class="remloginform <?php if($acc['loggedin']) echo "alreadyloggedin";?>"action="#">
							<h1 align="center">LOGIN</h1>
							<h3 class="logerrmsgh3"></h3>
							<input type="text" name="username" placeholder="Phone no." />
							<input type="password" name="password" placeholder="Password"/>
							<button>Login</button>
						</form>
						<a class="regilink <?php if($acc['loggedin']) echo "alreadyloggedin";?>"href="register">Register</a>
						<h3 class="aftersuclogin <?php if($acc['loggedin']) echo "showaccnt";?>" id="afterlogname">
						<?php if($acc['loggedin']) echo $acc['name'];?>
						</h3>
						<a class="aftersuclogin <?php if($acc['loggedin']) echo "showaccnt";?>"href="dashboard.php"><button>Dashboard</button></a>
						<a class="aftersuclogin <?php if($acc['loggedin']) echo "showaccnt";?>"href="#"><button id="remsignoutbtn">Sign-Out</button></a>
					</div>
				</div>
				
			</div>
		</div>
		<div class="fixedhead navdiv">
			<div class="class1050" align="left">
				<ul class="nvul">
					<?php echo $catstr;?>
				</ul>
			</div>	
			
		</div>
		<script type="text/javascript" src="./javascripts/remoteopp.js"></script>