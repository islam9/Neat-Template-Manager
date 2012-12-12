<?php
	if (!empty($this->neat->css_output)) {
		foreach ($this->neat->css_output as $css) {
			echo $css;
		}
	}
	
	if (!empty($this->neat->js_output)) {
		foreach ($this->neat->js_output as $js) {
			echo $js;
		}
	}
	
	if (!empty($this->neat->metatags)) {
		foreach ($this->neat->metatags as $metatags) {
			echo $metatags;
		}
	}
	
?>