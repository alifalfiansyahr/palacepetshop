<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

		if(!$this->session->userdata('login'))
            redirect('login');
	}
	
	public function index()
	{
		$data = array(
			'view'          => 'dashboard/index',
			'js'            => array(),
			'css'           => array(),
			'title'         => 'Home Admin',
		);

		$this->load->view('layout/backend', $data);
	}
}
