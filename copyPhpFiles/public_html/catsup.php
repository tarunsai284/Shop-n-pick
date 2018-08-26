<html>
<body>
	<ol>
<?php
	
	if(file_exists("json/category1.json"))
	{
			$result['success']=true;
			$string = file_get_contents("json/category1.json");
			$json = json_decode($string, true);
			foreach($json as $i)
			{
				
				if(isset($i['sub']))
				{
					echo "<li><h2>".$i['name']."</h2><ol>";
					foreach($i['sub'] as $j)
					{
						if(isset($j['usub']))
						{
							echo "<li><h4>".$j['name']."</h4><ol>";
							foreach($j['usub'] as $k)
							{
								echo "<li><h5>".$k['name']."</h5></li>";
							}
							echo "</ol>";
						}
						else
							echo "<li><h3>".$j['name']."</h3>";
					}
					echo "</ol>";
				}
				else
					echo "<li><h2>".$i['name']."</h2></li>";
					
			}
	}
		else
			$result['success']=false;
	echo json_encode($json);	
?>
	</ol>


		
	</body>
</html>