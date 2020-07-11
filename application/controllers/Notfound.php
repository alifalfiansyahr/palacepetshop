<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
	}

	public function index()
	{
		$data = array(
			'view'          => 'layout/notfound',
			'js'            => array(),
			'css'           => array(),
			'title'         => 'Not Found - Tastivo',
		);

		$this->load->view('layout/notfound', $data);
	}
}
