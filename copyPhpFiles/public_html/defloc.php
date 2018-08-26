<?php
	function sortof($a,$b) {
    
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
			echo json_encode($places);
		}
			
?>