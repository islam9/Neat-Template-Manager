<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	public function index() {
		
		$data_sample = array();
		$data_sample['sample1']='data1';
		$data_sample['sample2']='data2';
		
		
		$this->neat->setLayout('default');
		$this->neat->render('home/index', $data_sample);

		
	}
	
}