<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Neat
{
	
	private 	$config;
	private 	$layout;
	private 	$data				=	array();
	private 	$ci_instance;
	private		$elements_folder;
	private		$html_webroot;
	public	 	$css_output			=	array();
	public	 	$js_output			=	array();
	public	 	$metatags			=	array();
	
	public function __construct() {
	
		include_once(APPPATH.'config/custome/neat.php');

		$this->config = $neat_lm;

		$this->layout 			=	'layouts/'.$this->config['default_layout'];
		$this->elements_folder	=	$this->config['elements_folder'];
		
		$this->html_webroot		=	$this->config['HTML_WEBROOT'];

		$this->ci_instance =& get_instance();
		
	}
	
	function setLayout($name) {
		
		$this->layout = 'layouts/'.$name;
		
	}
	
	function render($view, $data = null, $return = false) {
		
		if($data != null && is_array($data)) {

			$this->data = array_merge($this->data, $data);
		
		}
		
		$content_layout = array();
		
		$content_layout['content_for_layout'] = $this->ci_instance->load->view($view, $this->data, true);

		if ($return) {
			
			$output = $this->ci_instance->load->view($this->layout, $content_layout, true);
			return $output;
			
		} else {

			$this->ci_instance->load->view($this->layout, $content_layout, false);
			
		}
		
	}
	
	function get_elements($name) {

		$output = $this->ci_instance->load->view($this->elements_folder.'/'.$name, $this->data, false) ;
		return $output;
		
	}
	
	// Must be called before render method so data applies to view
	public function bind_data($key, $value) {

		$this->data[$key] = $value;
		return $this;
		
	}
	
	public function css($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE) {
	
		$css_output = '';
		
		if (strpos($href, '//') !== false) {
			
			$this->css_output[] = link_tag($href , $rel, $type, $title, $media, $index_page = FALSE);
			
		}else{
			
			$this->css_output[] = link_tag($this->html_webroot.$href , $rel, $type, $title, $media, $index_page = FALSE);
			
		}

		
	}
	
	public function js($src = '', $language = 'javascript', $type = 'text/javascript') {

		if (strpos($src, '//') !== false) {
			
			$this->js_output[] = '<script type="'.$type.'" src="'.$src.'"></script>';
			
		}else{
			
			$this->js_output[] = '<script type="'.$type.'" src="'.$this->html_webroot.$src.'"></script>';
			
		}
		
	}
	
	public function meta_tag_link($name = "", $content = "", $type = 'name') {

		$this->metatags[]=meta($name,$content,$type);

	}

	
}