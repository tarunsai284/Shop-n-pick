<?php
session_start();
if(isset($_POST['Category']))
{
$contents = file_get_contents(dirname(__FILE__) . '/json/category.json', true);
$contents=json_decode($contents,true);
//forCreation(1);
if(isset($contents))
{	
	$data=$_POST['Category'];
    array_push($contents,$data);
}	
else
{$contents=array(); 
$contents[1]=$_POST['Category'];
}
//echo $data;
$fp = fopen (dirname(__FILE__) . '/json/category.json', 'w+');
fwrite($fp,json_encode($contents,true));
fclose($fp);
$contents = file_get_contents(dirname(__FILE__) . '/json/category.json', true);
$contents=json_decode($contents,true);	
print('Category appended "'.$_POST['Category']['name'].'" coded as "'.$_POST['Category']['code']).'"'.print_r($contents);;
		
//print_r($_POST);
}
else
{
forCreation(0);
}
function forCreation($i=0)
{if($i==0)
{
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="./javascripts/loader.js"></script>
<script>
function adding(sending)
{
$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "/SNP/category.php",  //file name
	data:  sending,
    success: function(server_response){ 
              alert(server_response)
				} 
	});
  }
function submitt()
{
var sending=$("#AddCategory").serialize();
adding(sending);

}

addsub.i=1;
function addsub()
{
//alert($("#sub").children().length);
$("#sub").append('<li>Name<input id="Category[sub]['+(++(addsub.i))+'][name]"  style="widdth:60%" name="Category[sub]['+(addsub.i)+'][name]" onkeypress="catchid(this.id)">Code<input id="Category[sub]['+(addsub.i)+'][code]"  style="widdth:30%" name="Category[sub]['+(addsub.i)+'][code]" value=""></li><div style="list-style:none"><div onclick="addsubsub('+(addsub.i)+');">Add Sub-Sub-Category</div></div><ol id="subsub'+addsub.i+'"></ol>');
}

function addsubsub(j)
{
//alert("Wanna Add Sub Category");
//alert($("#subsub"+j).children().length+$("#subsub"+j).html());
addsubsub.i = $("#subsub"+j).children().length;
$("#subsub"+j).append('<li>Name<input id="Category[sub]['+j+']['+(++addsubsub.i)+'][name]"  style="widdth:60%" name="Category[sub]['+j+']['+(addsubsub.i)+'][name]" onkeypress="catchid(this.id)">Code<input id="Category[sub]['+j+']['+(addsubsub.i)+'][code]"  style="widdth:30%" name="Category[sub]['+j+']['+(addsubsub.i)+'][code]" value=""></li>');
}
function catchid(idsent)
{
var sending=document.getElementById(idsent).value;
idsent=idsent.replace("name", "code"); 
var p=idsent.match(/\[[0-9]+\]/g);
var r=p.toString();
var t=document.getElementById("Category[code]").value+'_'+r.match(/[0-9]+/g);
$("#h").html(idsent+sending+"iiii"+r[0]+"iiiii"+r[1]+"iiiii"+r[2]+"iiiii"+r[3]);

document.getElementById(idsent).value=t.replace(",", "_");

}

</script>
<form id="AddCategory">
<div style="widdth:100%;float: left;">
<div id="inside" style="" ><b>Name of the category:</b><input id="Category"  style="widdth:60%" name="Category[name]">CODE<input id="Category[code]"  style="widdth:20%" name="Category[code]" value="">
<li style="list-style:none"><div onclick="addsub()">Add Sub-Category</div></li><ol id="sub"><li>Name<input id="Category[sub][1][name]"  style="widdth:60%" name="Category[sub][1][name]" onkeypress="catchid(this.id)">Code<input id="Category[sub][1][code]"  style="widdth:30%" name="Category[sub][1][code]">
<div style="list-style:none"><div onclick="addsubsub(1)">Add Sub-Sub-Category</div></div><ol id="subsub1"><li>Name<input id="Category[sub][1][1][name]"  style="widdth:60%" name="Category[sub][1][1][name]" onkeypress="catchid(this.id)">Code<input id="Category[sub][1][1][code]"  style="widdth:30%" name="Category[sub][1][1][code]"></li></ol></li></ol>
<div id="h"></div>

</div>
</div>
<div onclick="submitt()">
    submit
  </div>
</form>
<?php 
}
}
?>