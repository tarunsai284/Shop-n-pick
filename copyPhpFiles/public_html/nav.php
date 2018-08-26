<?php
/*
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
					$catstr.= "<li class=\"root\" data-div=\"".$i['code']."\">".$i['name']."<div id=\"".$i['code']."\" class=\"subdiv\"><ul>";
					foreach($i['sub'] as $j)
					{
						if(isset($j['usub']))
						{
							$catstr.= "<li class=\"sub\">".$j['name']."<div class=\"usubdiv\"><ul>";
							foreach($j['usub'] as $k)
							{
								$catstr.= "<li>".$k['name']."</li>";
							}
							$catstr.= "</ul></div>";
						}
						else
							$catstr.= "<li class=\"sub\">".$j['name']."";
					}
					$catstr.= "</ul></div>";
				}
				else
					$catstr.= "<li class=\"root\">".$i['name']."</li>";
					
			}	
		
	}
	else
		echo "Errrrrr...";*/
?>
<?php
/*
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
					$catstr.="<div class=\"class1050\" align=\"left\">";
					foreach($i['sub'] as $j)
					{	
						
						if(isset($j['usub']))
						{
							$catstr.= "<div class=\"usubdiv\"><h4 class=\"subh4\">".$j['name']."</h4><ul class=\"usubul\">";
							foreach($j['usub'] as $k)
							{
								$catstr.= "<li>".$k['name']."</li>";
							}
							$catstr.= "</ul></div>";
						}
						else
							$catstr.= "<h4 class=\"subh4\">".$j['name']."</h4>";
					}
					$catstr.="</div>";
					$catstr.= "";
				}
				else
					$catstr.= "<li class=\"root\">".$i['name']."</li>";
					
			}	
		
	}
	else
		echo "Errrrrr...";*/
?>
<?php
//valid
/*
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
		echo "Errrrrr...";*/
?>
<?php
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

<html>
	<head>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
		body
		{
			margin:0px;
		}
		.navout
		{
			width:100%;
			min-width:1050px;
			background-color:#181818;
			
			position:fixed;
		}
		ul
		{
			padding:0px;
		}
		.nvul
		{
			padding:0px;
		}
		.nvul li
		{
			list-style:none;
			display:inline-block;
			padding:12px 10px;
			color:#fff;
			cursor:pointer;
			font-size:12px;
			 font-family: 'Open Sans', sans-serif;
		}
		.subh4
		{
			padding:2px;
			margin:2px;
			font-weight:bold;
			color:#f90;
		}
		.class1050 .nvul .subdiv
		{
			position: absolute;
			  width: 100%;
			  min-width:1050px;
			  min-height: 100px;
			  border-top: 0;
			  left: 0;
			  margin-top: 7px;
			  cursor: default;
			  /* visibility: hidden; */
			  color: #565656;
			  background-color: #fff;
			  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.4);
			  font-size: 12px;
			  z-index: 101;
  }
		.subdiv ul ul
		{
			padding:0px;
			background-color:#fff;
			display:none;
		}
		.usubli:hover>ul
		{
			display:block;
		}
		.usubdiv
		{
			width:auto;
			max-width:200px;
			float:left;
			margin-right:10px;
			border:1px dotted #484848;
		}
		.subdiv ul li
		{
			display:inline-block;
			border-right:10px;
		}
		.subdiv ul ul li
		{
			background-color:#f5f5f5;
			font-weight:300;
			color:rgba(19, 89, 135, 0.9)x;
			display:block;
		}
		.subdiv
		{
			
			box-shadow:0 0 5px #484848;
		}
		.subdiv ul
		{
			padding:0px;
		}
		.subdiv li
		{	
			color:#484848;
			font-weight:bold;
			
		}
		.subdiv li:hover
		{
			background-color:#f0f0f0;
		}
		.subdiv
		{
			
		}
		.subdiv li:hover>ul
		{
			display:block;
		}
		.nvul li .subdiv
		{
			visibility:hidden;
		}
		.nvul li:hover
		{
			background-color:#f0f0f0;
			color:#484848;
		}
		.nvul li:hover>.subdiv
		{
			visibility:visible;
		}
		.class1050
		{
			width:1050px;
		}
		.usubul
		{
				background:#f5f5f5;
			  border-bottom: 3px solid #f89424;
			  border-left: 3px solid #f0f0f0;
			  border-right: 3px solid #f0f0f0;
			  display: none;
			  height: auto;
			  position: absolute;
			  width: 206px;
			  z-index: 16;
			  padding: 20px;
			  
		}
		</style>
	</head>
	<body>
		<div class="" align="center">
		<div class="navout">
			<div class="class1050">
			<ul class="nvul">
				<?php echo $catstr;?>
			</ul>
			</div>
		</div>
		</div>
	</body>
</html>