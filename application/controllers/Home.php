<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
        $this->load->model('m_product');
	}
	
	public function index()
	{
		$data = array(
			'view'          => 'home/index',
			'js'            => array(),
			'css'           => array(),
			'title'         => 'Pet Shop',
			'productHome'	=> $this->m_product->listProductHome(),
		);

		$this->load->view('layout/frontend', $data);
	}
}
