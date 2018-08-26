<?php require_once('includes/functions.php')?>
<?php if(!isset($mg))redirect_to("manage.php");?>
<?php
	$user=array();$uquery="select phoneno,name from userpass,userbasic where userbasic.uid=userpass.uid and userbasic.uid='".$_SESSION['uid']."' and userpass.active=1";
	$ruser=mysqli_query($connection,$uquery);
	if($ruser)
	{
		$row=mysqli_fetch_array($ruser);$user['name']=$row['name'];$user['phoneno']=$row['phoneno'];
	}
?>
<html>
	<head>
		<title>Getting started</title>
		<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
		<style type="text/css">
			button{ background: rgb(76, 142, 250); border: 0; border-radius: 2px;box-sizing: border-box;color: #fff;cursor: pointer;font-size: .875em;margin: 0;padding: 10px 24px;transition: box-shadow 200ms cubic-bezier(0.4, 0, 0.2, 1);}
			.msgdiv{padding:10px;width:400px; box-shadow:0 0 10px #484848;position:fixed;top:20%;left:20%;display:none;}.sucmsgdiv{background-color:lightgreen;color:#fff}.errmsgdiv{background-color:red;color:#fff;font-weight:bold;}
			.loaderdiv{	height:5px;width:100%;animation-duration: 4s;animation-fill-mode: forwards;animation-iteration-count: infinite;animation-name: placeHolderShimmer;	animation-timing-function: linear;background: -moz-linear-gradient(left center , #fff 0%, #fff 20%, #66ccff 40%, deepskyblue 100%) no-repeat scroll 0% 0% / 800px 104px #F6F7F8;position: fixed;top:0px;left:0px;background-size:cover;background-image: -webkit-linear-gradient(left, #fff 0%, #fff 20%, #66ccff 40%, deepskyblue 100%);-webkit-animation-duration: 3s;-webkit-animation-fill-mode: forwards;-webkit-animation-iteration-count: infinite;-webkit-animation-name: placeHolderShimmer;-webkit-animation-timing-function: linear;box-shadow:inset 0 0 2px #484848;}
	@-moz-keyframes placeHolderShimmer{0%{background-position:-468px 50%}100%{background-position:468px 50%}}
	@-webkit-keyframes placeHolderShimmer{0%{background-position:-468px 50%}100%{background-position:468px 50%}}}
			.cpydip{color:#fff;}
			header button{float:right;}
			button:hover {box-shadow: 0 1px 3px rgba(0, 0, 0, .50);}
			body{margin:0px;color:#484848;font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;}
			input{font: 300 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;font-weight:bold;}
			#lgdiv{width:auto;float:left;}
			.class1050{width:1050px;}
			header{min-width:1050px;padding:10px;background-color:#484848;border-bottom:2px solid #f9f9f9;overflow:auto;border-bottom:3px solid #f90;}
			header button{margin-top:10px;}
			.banner	h2
			{font-size:16px;color:#484848;font-weight:bold;line-height:20px;}
			.marg10{padding:10px;}
			.imph{padding:10px 15px;color:#f90;border:1px solid #66ccff;border-radius:3px;}
			.banner h1{margin-bottom:0px;}
			.imphblock{padding:20px;background-color:#66ccff;color:#fff;border-radius:5px;}
			.shpfooter{background-color:#484848;border-top:3px solid #f90;min-height:20px;padding:10px;}.shpfooter p{color:#fff;}
			.maincnt{min-height:100%;min-width:1050px;overflow:auto;}.bigf{font-size:120%;text-transform:uppercase;}
			.enqdiv{position:absolute;background-color:#fff;height:270px;padding:10px;padding-top:30px;width:300px;box-shadow:0 0 10px #484848;margin-left:750px;margin-top:-300px;border-radius:15px;;}
			.indexli{line-height:20px;border:1px solid #ddd;padding:5px 13px;border-radius:50%;background-color:#ddd;}
			.innernavul li{list-style:none;display:inline-block;padding:10px 15px;border:1px solid #ddd;float:left;background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);
  background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%);cursor:pointer;transition:0.3s;}.innernavul{padding:0px;padding-left:10px;}.innernavul li:hover{background:#484848;box-shadow:inset 0 0 10px #181818;color:#fff;font-weight:bold;}
			.innernavul li:first-child{border-top-left-radius:5px;border-bottom-left-radius:5px;;}.leftbar,.rightbar{float:left;width:50%;}.rightbar{float:right;}.stepul{list-style:none;padding:0px;}.stepul li{line-height:40px;}
			.innernavul li:last-child{border-top-right-radius:5px;border-bottom-right-radius:5px;;}.actliveli{border-top-left-radius: 20px;border-bottom-left-radius: 20px;margin-bottom: 5px;padding-left: 5px;background-color:#66ccff;color:#fff;border-right:3px solid deepskyblue;}
			#pgtag{color:#f90;line-height:50px;float:left;font-size:40px;padding-left:20px;}
			.dform input,.dform textarea{padding:10px;width:500px;}.actliveli .indexli{background-color:#42a2ce;border:3px solid deepskyblue;}.errin{box-shadow:0 0 10px red;}
			.repdet td{padding:10px;}.repdet thead{background-color:#f0f0f0;}.repdet{padding:10px;border:1px solid #f0f0f0;box-shadow:0 0 10px #484848;border-radius:5px;}
			.shoplist,.superdiv{padding:10px;box-shadow:0 0 5px #484848;margin-top:10px;background-color:#fff;border-radius:10px;}.superdiv h3{background-color:#f0f0f0; color: deepskyblue;padding-top:5px;padding-bottom:5px;padding-left:10px;}
		</style>
		<script type="text/javascript">
			function msgtimmer(){setTimeout(function(){$(".msgdiv").fadeOut();},3000);}
			function proceedL(level){if(level=="step1"){$(".stp1,.stp2").toggle(100);var li=$(".actliveli").attr('indexli');$(".actliveli").removeClass("actliveli");$(".stepul li").each(function(){if($(this).attr('indexli')==(li++))$(this).addClass("actliveli");})}}
			function createSuper(sup){if(!$("supdiv"+sup['id']).is(":visible")){$(".superdiv").slideUp(500);$(".superdiv").remove();$(".rightbar").append("<div class=\"superdiv supdiv"+sup['id']+"\"><h3>"+sup['name']+"</h3><table><tr><td>Owner:</td><td>"+sup['owner']+"</td></tr><tr><td>PAN NO.:</td><td>"+sup['panno']+"</td></tr><tr><td>Regsitered address:</td><td>"+sup['regi_addr']+"</td></tr><tr><td>Contact No.:</td><td>"+sup['phoneno']+"</td></tr></table></div>")}}
			function enterVal(sup){$("input[name=indishop]").val(sup['name']);$("input[name=owner]").val(sup['owner']);$("input[name=panno]").val(sup['panno']);$(".hideuponset").slideUp();$("input[name=supermref]").val(sup['id']);}
			function removeVal(){$(".hideuponset").slideDown();$("input[name=indishop],input[name=owner],input[name=panno]").val('');$("input[name=supermref]").val('indi')}
			$(document).ready(function()
			{
				$(".loaderdiv").slideUp();
				$("body").on('submit','.supermform',function(e)
				{
					e.preventDefault();
					var d=$(this).attr('rel');var sta=true;
					console.log(d);
					$("."+d+" input,textarea").each(function(){
						if(!$(this).val().length>0){
							$(this).addClass("errin");sta=false;
						}
						else
							$(this).removeClass("errin");
					});
					if(sta){
					$("."+d+" button").attr({'disabled':true});
					$("."+d+" button").text("Saving data...");
					$(".loaderdiv").slideDown();
					$.ajax
					({
						url:'shpent.php',
						type: 'POST',
						data: new FormData(this),
						processData: false,
						contentType: false					 
					})
					.done(function(data)
					{console.log("sending data");
					console.log(data);
					var obj=$.parseJSON(data);
					
					if(obj['success'])
					{$(".msgdiv").removeClass("errmsgdiv");$(".msgdiv").addClass("sucmsgdiv");$(".msgdiv").text(obj['suc_msg']);$(".msgdiv").fadeIn();$(".loaderdiv").slideUp();msgtimmer();var level=$("."+d+" input[name=level]").val();proceedL(level);}
					else{$(".msgdiv").removeClass('sucmsgdiv');$(".msgdiv").addClass("errmsgdiv");$(".msgdiv").text(obj['suc_msg']);msgtimmer();}$("."+d+" button").attr({'disabled':false});
					$("."+d+" button").text("Create");
					
					});
					}
					else
					{
						$(".msgdiv").addClass("errmsgdiv");
						$(".msgdiv").text("Incomplete form data available.");msgtimmer();
					}
				});
				$("body").on('change','.selsuper input[name=superm]',function()
				{
					var rel=$(this).val();
					if(rel.length>0)
					{var sup={'id':rel,'name':$(".trail"+rel+" .supermname").text(),'owner':$(".trail"+rel).attr('owner'),'panno':$(".trail"+rel).attr('panno'),'regi_addr':$(".trail"+rel+" .supermregi_addr").text(),'phoneno':$(".trail"+rel+" .supermphoneno").text()};
						createSuper(sup);
						enterVal(sup);
					}
					else
					{$(".superdiv").remove();removeVal();}
				});
			});
		</script>
	</head>
	<body>
	<header align="center">
		<div class="" align="center">
		<div class="class1050">
			<div id="lgdiv">
				<a href="index.php"><img src="./img/snpw2.png" alt="Shop'n'Pick" /></a>
			</div><span id="pgtag">Welcome to Individual Shop</span>
			<span style="color:#fff;"><?php echo $name;?></span>
			<a href="signout.php"><button>Sign Out</button></a>
		</div>
		</div>		
	</header>
	<div class="maincnt marg10" align="center">
		<div class="class1050">
			<div class="repdet" align="left">
				<h3>Select the supermarkets</h3>
				<p>If none of the listed supermarket is selected, then by default it will create individual shop profiles.</p>
				<table class="selsuper">
					<thead>
						<tr><td></td><td>Name of supermarket</td><td>Contact No.</td><td>Registered Address</td><td></td></tr>
					</thead>
					<?php
						$superm=array();$suplist=array();
						$query="select name,entid,regi_addr,owner,phoneno,panno from superm where ouid='".$_SESSION['uid']."'";
						$res=mysqli_query($connection,$query);
						if($res&&mysqli_num_rows($res)>0){while($row=mysqli_fetch_array($res))
						{
							$ecode='';$ename=explode(' ',$row['name']);foreach($ename as $i){$ecode.=$i.'_';}array_push($superm,$row);array_push($suplist,$row['entid']);
							echo "<tr class=\"trail".$row['entid']."\" rel=\"".$row['entid']."\" owner=\"".$row['owner']."\" panno=\"".$row['panno']."\"><td><input type=\"radio\" name=\"superm\" value=\"".$row['entid']."\"/></td><td><span class=\"supermname\">".$row['name']."</span></td><td><span class=\"supermphoneno\">".$row['phoneno']."</span></td><td><span class=\"supermregi_addr\">".$row['regi_addr']."</span></td><td><a href=\"manage.php?supermdet=".$row['entid']."&name=".$ecode."\"><button>Detail</button></a></td></tr>";
						}}
						else{echo "Sorry no supermarket profiles are created by you. <a href=\"manage.php?action=gettingstarted\"><button>Create a Supermarket</button></a>";}
					?>
					<tr><td><input type="radio" checked="checked" name="superm" value='' /></td><td>No, wanna add individual shop</td></tr>
				</table>
			</div>
			<div class="leftbar" align="left">
				<div class="dform">
					<form action="shpent.php" method="post" rel="stp1" class="supermform stp1">
						<p class="desc"><strong>Add your shop.</strong><br /> Your own marketplace where you will reach your customer more easily and learn what your customers wish.Know your shop, products and about your sale.</p>
						<h3>Basic Detail</h3>
						<div class="hideuponset">
						<label for="superm">Enter shop name</label><br /><br />
						<input type="text" name="indishop" placeholder="please enter shop name" /><br /><br />
						<label for="owner">Owner name</label><br /><br />
						<input type="text" name="owner" value="<?php echo $user['name'];?>" placeholder="Owner's name please" /><br />
						<label for="panno">Owner's PAN number</label><br /><br />
						<input type="text" name="panno"placeholder="PAN number of the owner"/><br /><br />
						</div>
						<label for="tinno">Enter TIN number for the shop</label><br /><br />
						<input type="text" name="tinno" placeholder="TIN is required for the registry"/>
						<input type="hidden" name="level" value="step2"/>
						<input type="hidden" name="enttype" value="indi" />
						<input type="hidden" name="supermref" value="indi" />
						<br />
						<h3>Contact Details</h3>
						<label for="regi_mail">E-Mail ID for registration</label><br /><br />
						<input type="text" name="regi_mail" placeholder="E-mail for registration" /><br /><br />
						<label for="phoneno">Phone Number</label><br /><br />
						<input type="text" name="phoneno" value="<?php echo $user['phoneno'];?>"placeholder="Enter contact no." /><br /><br />
						<label for="regi_addr">Shop Location</label><br /><br />
						<input type="text" rel="stp1"id="my-address"  placeholder="Landmark near shop e.g MMDA Colony"/><br /><br />
						<input type="hidden" id="address" autocomplete="off" name="address">
						<input type="hidden" id="latitude" autocomplete="off" name="latitude">
						<input type="hidden" id="longitude" autocomplete="off" name="longitude"><br />
						<textarea name="regi_addr" id="" cols="30" rows="10"placeholder="Enter your full address"></textarea>
						<button style="margin-top:10px;">Create</button>
						<div class="loaderdiv"></div>
					</form>
				</div>
			</div>
			<div class="rightbar" align="left">
				<div class="shoplist">
					<table class="shoplisttb">
						<?php
							$query="select name,shpid,shop_type spt,phoneno pno,addr from shopinfo where ouid='".$_SESSION['uid']."'";
							$res=mysqli_query($connection,$query);
							if($res)
							{
								while($row=mysqli_fetch_array($res))
								{
									if(in_array($row['spt'],$suplist))
										echo "<tr><td colspan=\"2\"><h3>".$row['name']."</h3></td></tr><tr><td width=\"50%\">Shop type:</td><td>Supermarket</td></tr><tr><td>Contact No.</td><td>".$row['pno']."</td></tr><tr><td>Address:</td><td>".$row['addr']."</td></tr><tr><td colspan=\"2\"><hr /></td></tr>";
									else
										echo "<tr><td colspan=\"2\"><h3>".$row['name']."</h3></td></tr><tr><td>Shop type:</td><td>Individual</td></tr><tr><td>Contact No.</td><td>".$row['pno']."</td></tr><tr><td>Address:</td><td>".$row['addr']."</td></tr><tr><td colspan=\"2\"><hr /></td></tr>";
										
								}
							}
						?>
					</table>					
				</div>
			</div>
		</div>
		
	</div>
	<div class="shpfooter" align="center">
		<div class="class1050" align="left">
			<p class="cpydip">&copy Copy rights reserved to Shop'n'Pick</p>
		</div>
	</div>
	<div class="msgdiv"></div>
	</body>
	
	<script type="text/javascript">
		var countryRestrict = { 'country': 'in' };
function initializeAdd() {
        var address = (document.getElementById('my-address'));
        var autocomplete = new google.maps.places.Autocomplete(address,{
        types: [],
        componentRestrictions: countryRestrict
      });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
        setTimeout(codeAddress, 500);
      });
}
function codeAddress() {
	geocoder = new google.maps.Geocoder();
	var address = document.getElementById("my-address").value;    
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
			document.getElementById("address").value = document.getElementById('my-address').value;
			document.getElementById("latitude").value = results[0].geometry.location.lat();
			document.getElementById("longitude").value = results[0].geometry.location.lng();
			console.log(results);
			
			var address = document.getElementById("address").value;
			var lat = document.getElementById("latitude").value;
			var lng = document.getElementById("longitude").value;
			
			var pageurl=document.getElementById('pageurl').value;
			/*var pathurl = pageurl+'Customers/chkloc_available';
			$.post(pathurl,{'search_keyword':address,'lat':lat,'lng':lng},function(data){
				if(data){
					var res = data.split('-');
					if(res[0] == 'msg'){
						$("#my-address").val('');
						alert(res[1]);
						//window.location.href=pageurl+'Partners/partner/';
						window.location.href;
					}else{
					  document.getElementById('searchfrm').submit();
					}
				}
			});*/
	  }
	  else {
		 var msg="Please enter a valid location.";
		 showMsg('err',msg);
		  i=0;
		  msg='';
		  return false;
		 setTimeout('removeMsg()',7000);
	  }
	});
}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', initializeAdd);
	</script>
	<script type="text/javascript">var showButton = true;</script>
	<script type="text/javascript">var apiKey = "AIzaSyDsKKpGm6PevT7qnUbazy2kSbSPmxxQFtY";</script>
</html>