<?php 
//jab user login karke karega to uncomment ker denge//require_once("./includes/session.php")?>
<?php
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
$action=array();
if(file_exists("json/".$_FILES['file1']['name']))
{
	if(move_uploaded_file($fileTmpLoc, "json/$fileName")){
		$result['success']=true;
		$action['type']="proexcel";
		$action['uid']=$_SESSION['uid'];
		$action['actsta']=true;
		$action['filename']=$fileName;
	} else {
		$result['success']=false;
	}
}
else
{
	$newfilename=$fileName.rand(5,1000).rand(5,100);
	if(move_uploaded_file($fileTmpLoc, "json/$newfilename")){
		$result['success']=true;
		$result['success']=true;
		$action['type']="proexcel";
		$action['uid']=$_SESSION['uid'];
		$action['actsta']=true;
		$action['filename']=$newfilename;
	} else {
		$result['success']=false;
	}
}
//jab user login karke karega to uncomment ker denge
//$_SESSION['autoprod']['stp1']=$action;
echo json_encode($result);
?>