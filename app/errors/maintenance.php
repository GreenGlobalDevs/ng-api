<?php 
if(!isset($MSG_SHUTDOWN)){
	$MSG_SHUTDOWN = '<h1>This website is currently offline for maintenance</h1><h2>Please try again later.</h2>';
}
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Offline</title>
	<style>
		body {color:#fff;font:500 14px sans-serif;padding:0px;margin:0px;background-color:#000;}
		.message {width:80%;margin:30px auto;font:500 16px arial;text-align:center;width:100%;}
	</style>
  </head>
<body>
	<div class="message">
		<?php echo $MSG_SHUTDOWN;?>
	</div>
</body>
</html>
