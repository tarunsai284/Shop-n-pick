<?php
	if(isset($_POST['pin'])&&isset($_POST['type']))
	{
		$ch=curl_init();
		if($_POST['type']=="pindet")
			$url="https://data.gov.in/api/datastore/resource.json?resource_id=6176ee09-3d56-4a3b-8115-21841576b2f6&api-key=b0292a46e1dd4dadef064b96229f6b9c&filters[pincode]=".$_POST['pin'];
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
		echo $json;
	}
?>