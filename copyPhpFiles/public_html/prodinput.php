<?php
	$contents=file_get_contents(dirname(__FILE__) . '/json/category1.json', true);
?>
<html>
	<head>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>-->
		<script type="text/javascript" src="./javascripts/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./javascripts/jquery.form.min.js"></script>
		<style type="text/css">
			.maincnt
			{
				width:100%;
				min-width:1250px;
			}
			body
			{
				font-size:70%;
				margin:0px;
				background-color:#f0f0f0;font: 100 16px/1.167 'Segoe UI Light','Segoe UI',Helvetica,Garuda,Arial,sans-serif;
			}

			.mandiv h1,.autodiv h1
			{
				margin:0px;
				border-bottom:5px solid #fff;
				color:#66ccff;
			}
			.mandiv h3
			{color:#484848;}
			.mandiv,.autodiv
			{
				border-radius:10px;
				border-top-left-radius:0px;				
				color:#fff;
				padding:10px;
				text-align:left;
			}
			.autodiv h1{color:#f0f0f0;}
			input[type=text],select,option
			{
				font-family:verdana,monospace;
				font-size:10px;
				padding:7px;
			}
			td
			{
				text-align:center;
				border-bottom:2px solid #ddd;
			}
			
			tr:hover>td
			{
				background-color:#b6c6d7;
			}
			.trdiv
			{
				border-bottom:2px solid #66ccff;
			}
			.defhide
			{
				display:none;
			}
			.mandiv
			{
				background-color:#f2f2f2;
			}
			.autodiv
			{
				background-color:deepskyblue;
			}
			.hidden
			{display:none;}
			.navuptypeul
			{
				list-style:none;
				padding:0px;
				margin:0px;
			}
			.activeli
			{
				background-color:#f90 !important;
				color:#fff;
			}
			.navuptypeul li
			{
				cursor:pointer;
				display:inline-block;
				padding:12px 15px;
				border:2px solid #ddd;
				box-shadow:inset 0 0 15px #484848;
				background-color:#fff;
				margin:0px;
				float:left;
				border-top-left-radius:10px;
				border-top-right-radius:10px;
			}
			.activeli
			{
				background-color:#f90;
				color:#fff;
			}
			.navdiv
			{
				overflow:auto;		
			}
			.defshow
			{	
				display:block;
			}
			.whitebg
			{
				min-height:100%;
				padding:20px;
				box-shadow:0 0 10px #484848;
				background-color:#fff;
			}
			tr
			{
				border-bottom:10px solid #f90;
				margin-bottom:10px;
			}
			button,input[type=submit]
			{
				padding:10px 15px;
				border-radius:5px;
				border:0px;
				text-shadow:0 -1px 1px #ddd;
				background-color:lightgreen;
				border-bottom:3px solid green;
				color:#fff;
				cursor:pointer;
			}
			.catdiv
			{
				text-align:left;
				
			border:2px solid #f90;
				padding:10px;
			}
			
			#itemtable tr td{transition:0.3s;  transition: 0.3s; padding: 10px; text-align: left;}
			td select
			{
				width:200px;
				margin-top:2px;
			}
			#itemtable tr td:hover,#itemtable tr td:focus
			{
				box-shadow:inset 0 0 30px #484848;
			}
			.errin
			{
				box-shadow:0 0 10px red;
			}
			#itemtable tr td:nth-child(even){background-color:#e8e8e8;}
			tr:nth-child(even) {background: #fff}
tr:nth-child(odd) {background: #ccc;}
			#knowmore:hover
			{
				text-decoration:underline;
			}
			
			header span
			{
				padding-left: 15px;
				padding-right: 15px;
				line-height:20px;
			}
			.proinlidiv
			{
				padding:10px;
			}
			.autodiv h3
			{color:#fff;}
		</style>
		<script type="text/javascript">
			var text="";
			var sub=[];
			$(document).ready(function()
			{
			//loading init
			var cats;
		var str= <?php echo $contents ?>;
		console.log(str);
		str=JSON.stringify(str);
		str=jQuery.parseJSON( str ); 
		text = "<option >--- Please select ---</option>";
		var x,y;
		//console.log(Object.keys(str).length);
		for (x in str) {
			text += '<option value="'+str[x]['code']+'">'+str[x]['name']+'</option>';
			var substr = "<option >--- Please select ---</option>";
			for (y in str[x]['sub']) {
			   substr+='<option value="'+str[x]['sub'][y]['code']+'">'+str[x]['sub'][y]['name']+'</option>';
			   var usubstr = "<option >--- Please select ---</option>";
			  // console.log(str[x]['sub'][y]['usub']);
					for (z in str[x]['sub'][y]['usub']) {
					//console.log(str[x]['sub'][y]['usub'][z]['code']);
					usubstr+='<option value="'+str[x]['sub'][y]['usub'][z]['code']+'">'+str[x]['sub'][y]['usub'][z]['name']+'</option>';
				   }
			   sub[str[x]['sub'][y]['code']]=usubstr;
			   }
			 sub[str[x]['code']]=substr;   
			 
		}
			//----init ends
			$(".Category").html(text);
			$(".navuptypeul li").click(function()
			{
				if(!$(this).is(".activeli"))
				{
					$(".activeli").removeClass("activeli");
					$(this).addClass("activeli");
					var rel=$(this).attr('rel');
					if(!$("."+rel).is(":visible"))
					{
						$(".defshow").removeClass("defshow");
						$("."+rel).addClass("defshow");
					}
				}
			});
			$(".manprodent").submit(function(e)
			{
				e.preventDefault();
				sta=true;fst=0;
				$(".formrow").each(function()
				{
					$(this).children("td").each(function()
					{
						$(this).children("input[type=text]").each(function()
						{
							if(!$(this).val().length>0)
							{$(this).addClass("errin");sta=false;fst++}
							else
							$(this).removeClass("errin");
							
						});
					
					});
					//if(fst==6){$(this).remove();sta=true;}//error all above rows are getting deleted
				});
				if(sta)
				{
					$(this).children().children(".submitaddnew").text("Saving...");
					$(this).children().children(".submitaddnew").attr({'disabled':true});
					var data={rowcount:0,action:'insertprod'};
					data.formdata=[];
					$(".formrow").each(function()
					{
						var t=$(this);
						var n=data.rowcount++;
						//cattype,prodname,prodbrand,prodspec,prodprice
						var temp={
						cattype:t.children().children("input.cattype").val(),
						prodname:t.children().children("input.prodname").val(),
						prodbrand:t.children().children("input.prodbrand").val(),
						prodspec:t.children().children("input.prodspec").val(),
						prodprice:t.children().children("input.prodprice").val(),
						prodstock:t.children().children("input.prodstock").val(),
						prodtype:t.children().children("input.prodenttype").val()};
						data.formdata.push(temp);						
					});
					//----ajax---
					$.ajax({
							type: 'POST',
							url:'prodinputsup.php',
							data:$.extend({}, data),
							datatype:'json',
							encode:true
						})
						.done(function(data)
						{
							console.log(data);
						});
				}
				
			});
		});
				function fun(sid,n)
		{// alert(sid+n);
		 var selected= $("."+sid+"[n='"+n+"']").val();
		// alert(selected);
		 //alert(sub[selected]);
		 if(sid=="Category")
		 {$(".sub[n='"+n+"']").html(sub[selected]);}
		 else{$(".usub[n='"+n+"']").html(sub[selected]); }
		 $("input[name='p["+n+"][7]']").val(selected);
		}
			function addmore(){  
		  var l=$("input[name='addrow']").val();
		  var cl=$("#itemtable").children().children().length;///change if using display:table
		  //alert(cl);
		  for(i=1;i<=l;i++)
		  {$("#itemtable").append('<tr  class="formrow"style="padding:10px;" height:90px;><div class="trdiv">'+
				'<td><input type="checkbox" class="removerow" /></td><td><input type="text" class="cattype" disabled="disabled" name="p['+cl+'][7]" value=""/><br />'+
				'  <select n="'+cl+'" class="Category" onchange="fun(this.getAttribute(\'class\'),this.getAttribute(\'n\'))">'+text+'</select><br />'+
				'  <select n="'+cl+'" class="sub" onchange="fun(this.getAttribute(\'class\'),this.getAttribute(\'n\'))"></select><br />'+
				'  <select n="'+cl+'" class="usub" onchange="fun(this.getAttribute(\'class\'),this.getAttribute(\'n\'))"></select>'+
				'</td>'+
                '<td><input type="text" class="prodbrand" placeholder="e.g Nestle" name="p['+cl+'][2]"/></td>'+				
				'<td><input type="text"placeholder="e.g Maggi Tomato Sauce" class="prodname" name="p['+cl+'][3]"/><input type="hidden" class="prodenttype" value="new"/></td>'+
				'<td><input type="text"placeholder="e.g 700gm" class="prodspec" name="p['+cl+'][4]"/></td>'+
				'<td><input type="text"placeholder="e.g 75" class="prodprice"name="p['+cl+'][5]"/></td>'+	
				'<td><input type="text"placeholder="e.g 10" class="prodstock";name="p['+cl+'][6]"/></td>'+
				'</div></tr>'
			);
			cl++;
		  }
        }
		function fun(sid,n)
		{// alert(sid+n);
		 var selected= $("."+sid+"[n='"+n+"']").val();
		// alert(selected);
		 //alert(sub[selected]);
		 if(sid=="Category")
		 {$(".sub[n='"+n+"']").html(sub[selected]);}
		 else{$(".usub[n='"+n+"']").html(sub[selected]); }
		 $("input[name='p["+n+"][7]']").val(selected);
		}
		
		function deleterow(dclass)
		{
			$(dclass+" input[type=checkbox]:checked").each(function()
			{
				$(this).parent().parent().remove();
			});
		}
	
		
		</script>
		<script type="text/javascript">
		</script>
		<script>
$(document).ready(function()
{
	$("#faddbtn").click(function(e)
	{
		e.preventDefault();
		$("input[name=file1]").click();
		
	});
	$("body").on('change',"input[name=file1]",function(e)
	{
		if(!$(this).val().length>0)
		{
			$(this).remove();
		}
		else
		{			
			var val=$(this).val();
			var doc=checkFile(val);
			if(doc=="Invalid" &&(this.files[0].size<=20971520))
			{$("#filestatus").addClass("errsta").text("Invalid type or file size greater than 20MB, please select an excel file *xls or *xlsx of file size less than 20 MB."); $("#file1").replaceWith( control = $("#file1").clone( true ) );}
			else
			{$("#filestatus").removeClass("errsta").text("File name :"+getFname(val))};
		
		}
	});
	$('#upload_form').submit(function(e) {	
		
        if($('#file1').val()) {
            e.preventDefault();
        //    $('#loader-icon').show();
            $(this).ajaxSubmit({ 
				beforeSubmit: function() {
				  $("#progressBar").val(0);
				},
				uploadProgress: function (event, position, total, percentComplete){	
					$("#progressBar").val(Math.round(percentComplete));
					$("#status").text(Math.round(percentComplete)+"%");
					$("#loaded_n_total").text("Uploaded "+position+" out of "+total+" bytes");
				},
				success:function (data){
					console.log(data);
				},
				resetForm: true 
			}); 
            return false; 
        }
    });
});
function getFname(val)
{
	var i=val.lastIndexOf("\\");
	var j=val.lastIndexOf(".");
	var name=val.substr(i+1,j);
	return name;
}
function checkFile(val)
{
	var i=val.lastIndexOf(".");
	var ext=val.substr(i,val.length-1);
	var doc="invalid";
	if(ext==".xls"||ext==".xlsx")
	{
		doc="excel";
	}
	else
	doc="Invalid";
	return doc;
}
</script>
		
	</head>
	<body>
		<div class="maincnt" align="center">
			<div class="class1380 whitebg">
				<div class="navdiv">
				<ul class="navuptypeul" align="left">
					<li class="activeli"rel="mandiv">Manual Entry</li>
					<li rel="autodiv">File Upload</li>
				</ul>
				</div>
				<div class="swapdiv">
					<div class="mandiv defhide defshow">
						<h3>Add New Product</h3>
						<div class="newprodaddadiv">
							<input name="addrow" type="text" placeholder="No." /><button id="" onclick="addmore();">Add Rows</button> <button style="background-color:coral;border-color:red;" onclick="deleterow('.manprodent')">Delete Selected rows</button>
							<form action="#" class="manprodent">
								<table id="itemtable" style="width:100%;" >
								  <tr>
									<th>Select</th>
									<th>Category</th>
									<th>Brand</th>
									<th>FullName</th>
									<th>Specifics</th>
									<th>Cost</th>
									<th>Stock</th>    
								  </tr>
								  <?php
								  /*
									for($i=1;$i<=5;$i++)
									{	
										echo '<tr style="padding:10px;" height:75px;>'.
										'<td><div class="catdiv"><input disabled="disabled" name="p['.$i.'][7]" value=""></input><br />'.
										'  <select n="'.$i.'" class="Category" onchange="fun(this.getAttribute(\'class\'),this.getAttribute(\'n\'))"></select><br />'.
										'  <select n="'.$i.'" class="sub" onchange="fun(this.getAttribute(\'class\'),this.getAttribute(\'n\'))"></select><br />'.
										'  <select n="'.$i.'" class="usub" onchange="fun(this.getAttribute(\'class\'),this.getAttribute(\'n\'))"></select>'.
										'</div></td>'.
										'<td><input type="text" placeholder="e.g Nestle" name="p['.$i.'][2]"></input></td>'.
										'<td><input type="text"placeholder="e.g Maggi Tomato Sauce" name="p['.$i.'][3]"></input></td>'.
										'<td><input type="text"placeholder="e.g 700gm"name="p['.$i.'][4]"></input></td>'.
										'<td><input type="text"placeholder="e.g 75"name="p['.$i.'][5]"></input></td>'.	
										'<td><input type="text"placeholder="e.g 10"name="p['.$i.'][6]"></input></td>'.
										'</tr>';
									 }*/
								  ?>
								</table>
								<div align="center" style="padding:10px;"><button class="submitaddnew">Submit Above</button></div>
							</form>
						</div>
					</div>
					<div class="autodiv defhide">
						<ul class="proccesul">
							<li class="processli" rel="1">
							<header><h1>Step-1:: Upload your data file</h1></header>
							<div class="proinlidiv processli_step1div">
							<form id="upload_form" action="file_upload_parser.php" enctype="multipart/form-data" method="post">
							  <h3>Please select your shop's data file in the excel sheet file.</h3>
							  <p id="knowmore" ref="step1">Help</p>
							  <h4 id="filestatus"></h4>
							  <button id="faddbtn">Add file</button><p id="filename"></p><input type="file"class="hidden" name="file1" id="file1"><br/>
							  <input type="submit" value="Upload File" >
							  <progress id="progressBar" value="0" max="100" style="height:30px;width:300px;"></progress>
							  <h3 id="status"></h3>
							  <p id="loaded_n_total"></p>
							  <div id="targetLayer"></div>
							</form>
							</div>
							</li>
						</ul>
					</div>
				</div>
			</div>			
		</div>
	</body>
</html>