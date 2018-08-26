$(document).ready(function()
{
	$(".remloginform").submit(function(e)
	{
		e.preventDefault();
		var sta=true;
		$(".remloginform input").each(function()
		{
			if(!$(this).val().length>0)
			{sta=false; $(this).addClass("empin");}
			else
				$(this).removeClass("empin");
		});
		if(sta)
		{
			$(".remloginform button").text("Logging in...");
			$(".remloginform button").attr({'disabled':true});
			var formD={'action':'login','type':'remote','phone':$("input[name=username]").val(),'password':$("input[name=password]").val()};
			$.ajax({
			type: 'POST',
			url:'logcheck.php',
			data: formD,
			datatype:'json',
			encode:true
			})
			.done(function(data)
			{
				console.log(data);
				var obj=$.parseJSON(data);
				if(obj['success'])
				{
					$(".remloginform,.regilink ").slideUp();
					$(".aftersuclogin").slideDown();
					$("#afterlogname").text(obj['name']);
				}
				else
				{					
					$(".logerrmsgh3").text("In-correct combination of phone n password"+obj['msg']);
					$(".logerrmsgh3").fadeIn();
				}
				$(".remloginform button").text("Login");
				$(".remloginform button").attr({'disabled':false});
			});
		}
	});
	$("#remsignoutbtn").click(function(e)
	{
		e.preventDefault();
		$(this).text("Logging off...");
		$(this).attr({'disabled':true});
		var formD={'rem_out':true};
		$.ajax({
		type: 'POST',
		url:'signout.php',
		data: formD,
		datatype:'json',
		encode:true
		})
		.done(function(data)
		{
			var obj=$.parseJSON(data);
			if(obj['success'])
			{
				$(".remloginform,.regilink ").slideDown();
				$(".aftersuclogin").slideUp();
				$("#afterlogname").text("");
			}
			$("#remsignoutbtn").text("Sign-out");
			$("#remsignoutbtn").attr({'disabled':false});
		});
		
	});
});