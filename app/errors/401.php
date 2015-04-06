<?php 
if(!isset($MSG_401)){
	$MSG_401 = 'We\'re sorry, you do not have sufficient permissions to access this page.';
}
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">
	<title>ERROR 401 : Access denied</title>
	<style>
		body {color:#000;font:500 14px sans-serif;padding:0px;margin:0px;}
		.error{position:relative;font:800 65px arial;color:red;}
		.error .sha{position:absolute;top:2px;left:3px;z-index:-1;font:800 65px arial;color:#000;}
		.message {font:500 15px arial;}
		.message p{margin:0px 0px 5px 0px;color:red;font:500 16px arial;}
		.message a{font:500 15px arial;}
		.message a:link{color:#00f;}
		.message a:visited{color:#00f;}
		.message a:hover{color:#f0f;}
		.path {color:#666;font:500 14px arial;}
	</style>
  </head>
<body>
	<table>
		<tr>
			<td width="140" style="padding-left:20px;">
				<span class="error">401<span class="sha">401</span></span>
			</td>
			<td class="message">
				<p><?php echo $MSG_401;?></p>
				Please contact administor via email address <a href="mailto:webmaster@linksie.com">webmaster@linksie.com</a> for detail.
			</td>
		</tr>
	</table>
</body>
</html>
