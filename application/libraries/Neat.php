<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Islam Khalil Ahmed Saber

class Neat
{
	
	private $config;
	private $layout;
	private $data = array();
	private $ci_instance;
	private $elements_folder;
	private $html_webroot;
	
	public $page_title;
	public $css_output		=	array();
	public $js_output		=	array();
	public $js_body_output	=	array();
	public $metatags		=	array();
	
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
	
	function render( $view, $data = null, $return = false ) {

		if( $data != null && is_array($data) ) {

			$this->data = array_merge($this->data, $data);

		}

		$content_layout = array();
		$content_layout['content_for_layout']	=	$this->ci_instance->load->view($view, $this->data, true);
		
		$content_layout['title_for_layout']		=	trim($this->page_title);
		$content_layout['meta_for_layout']		=	trim($this->get_meta());
		$content_layout['style_for_layout']		=	trim($this->get_css());
		$content_layout['script_for_layout']	=	trim($this->get_js());
		$content_layout['script_for_body']		=	trim($this->get_js_in_body());

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
	
	public function setPageTitle($page_title) {
		
		$this->page_title=$page_title;
		
	}

	public function css($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE) {

		$css_output = '';

		if (strpos($href, '//') !== false) {

			$this->css_output[] = link_tag($href , $rel, $type, $title, $media, $index_page = FALSE);

		}else{

			$this->css_output[] = link_tag($this->html_webroot.$href , $rel, $type, $title, $media, $index_page = FALSE);

		}

	}

	public function js($src = '', $in_body = false , $language = 'javascript', $type = 'text/javascript') {

		if(!$in_body){
			
			if (strpos($src, '//') !== false) {
	
				$this->js_output[] = '<script type="'.$type.'" src="'.$src.'"></script>';
	
			}else{

				$this->js_output[] = '<script type="'.$type.'" src="'.$this->html_webroot.$src.'"></script>';

			}
			
		} else {

			if (strpos($src, '//') !== false) {
	
				$this->js_body_output[] = '<script type="'.$type.'" src="'.$src.'"></script>';
	
			}else{
	
				$this->js_body_output[] = '<script type="'.$type.'" src="'.$this->html_webroot.$src.'"></script>';
	
			}
			
		}

	}

	public function meta_tag_link($name = "", $content = "", $type = 'name') {

		$this->metatags[]=meta($name,$content,$type);

	}
	
	public function get_js() {
		$js_links='';
		if (!empty($this->js_output)) {
			foreach ($this->js_output as $js) {
				$js_links .= $js;
			}
		}
		unset($this->js_output);
		return $js_links;
	}
	
	public function get_js_in_body() {
		$js_body_links = '';
		if (!empty($this->js_body_output)) {
			foreach ($this->js_body_output as $js) {
				$js_body_links .= $js;
			}
		}
		unset($this->js_body_output);
		return $js_body_links;
	}
	
	public function get_css() {
		$css_links = '';
		if (!empty($this->css_output)) {
			foreach ($this->css_output as $css) {
				$css_links .= $css;
			}
		}
		unset($this->css_output);
		return $css_links;
	}
	
	public function get_meta() {
		$meta_link='';
		if (!empty($this->metatags)) {
			foreach ($this->metatags as $meta) {
				$meta_link .= $meta;
			}
		}
		unset($this->metatags);
		return $meta_link;
	}
	
	function handle_qoutes($txt){
		//return htmlspecialchars(stripslashes($txt), ENT_QUOTES);
		return html_entity_decode(stripslashes($txt),ENT_QUOTES, 'UTF-8');
	} 
	


}