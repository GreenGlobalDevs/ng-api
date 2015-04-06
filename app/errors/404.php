<?php 
if(!isset($MSG_404)){
	$MSG_404 = 'We\'re sorry, the page you are looking for can not be found.';
}
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">
	<title>ERROR 404 - Page not found</title>
	<style>
		body {color:#000;font:500 14px sans-serif;padding:0px;margin:0px;}
		.error{position:relative;font:800 65px arial;color:red;}
		.error .sha{position:absolute;top:2px;left:3px;z-index:-1;font:800 65px arial;color:#000;}
		.message {font:500 16px arial;}
		.message p{margin:0px 0px 5px 0px;}
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
				<span class="error">404<span class="sha">404</span></span>
			</td>
			<td class="message">
				<p><?php echo $MSG_404;?></p>
				<a href="/">Back to the default page</a>
			</td>
		</tr>
	</table>
</body>
</html>
