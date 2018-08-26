<?php
if(isset($_POST['email'])&&isset($_POST['name']))
{
	$val=array();
	$message = '
<html>
<head>
  <title>Shop\'n\'Pick</title>
</head>
<body style="margin:0px;background-color:#f0f0f0">
  <h1 style="font-family:verdana,arial,sans-serif;background-color:rgba(19, 89, 135, 0.9);background-image:url(\'http://www.snpuser.pe.hu/img/square.png\');font-weight:300;color:#fff;padding:10px;font-size:24px;"><img style="width:150px;height:auto;vertical-align:middle;" src="http://www.snpuser.pe.hu/img/snp.png" alt="Shop\'n\'Pick"/></h1>
  <div style="oveflow:auto;">
  <h2 style="color:#f90;font-weight:300;padding:10px;padding-bottom:0px;margin-bottom:0px;">Thank you,<strong> '.$_POST['name'].'</strong></h2>
  <h3 style="font-family:verdana,arial,sans-serif;padding:10px;color:rgba(19, 89, 135, 0.9);margin-top:0px;font-weight:300;padding-top:0px;">for registering with us. We wish to deliver you the best service.</h3>
  <div align="center" style="width:100%;padding-top:20px;padding-bottom:20px;background-color:lightskyblue;">
  <div style="oveflow:auto;background-color:floralwhite;width:80%;padding:20px;box-shadow:0 0 10px #484848;border-radius:10px;">
	<h1 style="font-weight:300;color:#484848;font-size:25px;border-bottom:1px dashed #66ccff;">What we are?</h1>
	<ul style="background-color:#ddd;padding:10px;width:100%">
	<li style="list-style:none;padding:5px;font-family:monospace,arial;margin-bottom:5px;margin-top:5px;border-radius:5px;font-weight:300;color:rgba(255, 255, 255, 0.9);background-color:#ff6000;">Shop\'n\'Pick introduced the concept of putting you in the driving seat at your home and visit your favourite shops online.</p></li>
	<li style="list-style:none;padding:5px;font-family:monospace,arial;margin-bottom:5px;margin-top:5px;border-radius:5px;font-weight:300;color:rgba(19, 89, 135, 0.9);background-color:#81d5ff;">We help you to get the actual prices of products and help you to make your shopping without pen n paper.</p></li>
	<li style="list-style:none;padding:5px;margin-bottom:5px;font-family:monospace,arial;margin-top:5px;border-radius:5px;font-weight:300;color:rgba(72, 72, 72, 0.9);background-color:#ffc500;">Get the bill online and with 99.9% accuracy. <br /> No more waiting in queues, just keep your engine running n get your shopping done.</p></li>
	</ul>
	<h1 style="font-weight:300;color:#484848;font-size:25px;">Happy Shopping !!!</h1>
	<a href="www.snpuser.pe.hu"><button style="width: 200px;padding: 10px;padding-left: 15px;padding-right: 15px;background-color: rgba(19, 89, 135, 0.9);border: 1px solid #fff;color: #fff;cursor: pointer;">Starts Here</button></a><br />
	<h4 style="  font-weight: 300;color: #66ccff;font-size: 26px;margin: 5px;">Contact us via E-mail</h4>
	<a href="mailto:care@snpuser.pe.hu"><button style="width: 200px;padding: 10px;padding-left: 15px;padding-right: 15px;background-color: rgba(19, 89, 135, 0.9);border: 1px solid #fff;color: #fff;cursor: pointer;">Mail Us</button></a>
  </div>
  </div>
  </div>
</body>
</html>
';
// multiple recipients
	$to  = $_POST['email'];

	// subject
	$subject = 'Welcome to Shop\'n\' Pick';

	// message

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: Shop\'n\'Pick <admin@snpuser.com>' . "\r\n";
	/*$headers .= 'To:Abby <mary@example.com>' . "\r\n";
	$headers .= 'From: Shop\'n\'Pick <snp@example.com>' . "\r\n";
	$headers .= 'Cc: snpuser@example.com' . "\r\n";
	$headers .= 'Bcc: snp@example.com' . "\r\n";*/
	// Mail it
	if(mail($to, $subject, $message, $headers))
		$val['mail_success']=true;
	else
		$val['mail_success']=false;
}
?>
<!--
<html>
	<body>
		<form action="mailde" method="post">
			<input type="text" name="email" placeholder="email id" />
			<input type="submit" name="fmail" value="email me" />
		</form>
	</body>
</html>-->