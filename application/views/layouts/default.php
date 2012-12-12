<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Neat Template Manager</title>
		<?php $this->neat->get_elements('neat/header_script_for_layout'); ?>
	</head>
	
	<body>
	
		<h1 style="color: blue;"> Here is the Layout Header </h1>
		
		<?php echo $content_for_layout; ?>	
		
		<h1 style="color: red;"> Here is the Layout Footer </h1> 
		
	</body>

</html>