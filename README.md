NEAT Layout Manager:
--------------------
Neat is a cakephp like layout manager , you can find in this repository Neat library 
with an example of how to use it.

Instalation:
------------
Download CodeIgniter from the project webpage
Extract Project content into you codeigniter folder - Take care there is an example called Home.
In autload config add Neat library -- $autoload['libraries'] = array('Neat');
In autload config add url and html helpers -- $autoload['helper'] = array('url','html');

Usage:
------
In Neat configuration file define your layout , your webroot folder and elements folder.
Ex:
	$neat_lm['default_layout']	= 'default';
	$neat_lm['elements_folder']	= 'elements';
	$neat_lm['HTML_WEBROOT']	=  base_url().'webroot/';


define you layout use:
	$this->neat->setLayout('default');

Render View use :
	$this->neat->render('home/index', $data_sample);

using CSS Or Javascript use:

	$this->neat->css('css/bs.min.css');  OR $this->neat->css('http://wwww.URL');
	$this->neat->js('js/jq.min.js');     OR $this->neat->js('http://wwww.URL');

Use Elements:
	$this->neat->get_elements('home/hello',$sample1);

Use Metatags:
	$this->neat->meta_tag_link('description','Neat Template Manager');


In your Layout file:
--------------------
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
