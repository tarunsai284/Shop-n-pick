
<html>
<head>
	<style type="text/css">
		body
		{
			margin:0px;
		}
	</style>
</head>
<body>
	<header>
		
	</header>
	<div>
		<div class="">
			<input type="text" id="my-address"  placeholder="Enter your delivery location..."/>
			<input type="hidden" id="address" autocomplete="off" name="address">
			<input type="hidden" id="latitude" autocomplete="off" name="latitude">
			<input type="hidden" id="longitude" autocomplete="off" name="longitude">
		</div>
	</div>
</body>
<!--
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#my-address').keypress(function(e) {
			if (e.which == 13) {
				codeAddress();
			}
			});
		});
	</script>
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
-->
</html>