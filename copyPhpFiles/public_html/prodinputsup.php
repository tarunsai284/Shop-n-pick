<?php
	$result=array();
	if(isset($_POST['action']))
	{		
		$_SESSION['spid']="spid";
		$qprod="";$qprice="";
		$con=mysqli_connect("localhost", "snp","snp","snp");
		$rowc=$_POST['rowcount'];
		$result['data']=$_POST['formdata'];
		print_r($result['data']);
		
		foreach($_POST['formdata'] as $p)
		{
			$prodid=$p['prodtype'];///if Prodid is obtained from autocomplete saved to prodtype

			if($p['prodtype']=="new")
				{
				$prodid="PR".rand(2,100).date('dihms');
				$qprod.="INSERT INTO `product`(`ProdID`, `CategoryID`, `Brand`, `fullName`,`Toe`) VALUES ('$prodid','".$p['cattype']."','".$p['prodbrand']."','".$p['prodname']."-".$p['prodspec']."','".date('dihms')."') ; " ;
				}
			$priceid="PRICE".rand(2,1000).rand(3,1000).date('dihms');
			$qprice.= "INSERT INTO `price`(`PriceID`, `ShopID`, `ProdID`, `Price`,`Toe`) VALUES ('$priceid','".$_SESSION['spid']."','".$prodid."','".$p['prodprice']."','".date('dihms')."') ; " ;
		
		}
		if (mysqli_multi_query($con, $qprod))
		{       $con->close();
		        $con=mysqli_connect("localhost", "snp","snp","snp");
			$result['prod_insert']=true;
			if(mysqli_multi_query($con, $qprice))
				$result['price_insert']=true;
			else
				{$result['price_insert']=false;$result['price_error']=mysqli_error($con);echo $result['price_error'];}
		}
		else
		{$result['prod_insert']=false;$result['prod_error']=mysqli_error($con);echo $result['prod_error']; }
		
	}
	//echo json_encode($result);
?>