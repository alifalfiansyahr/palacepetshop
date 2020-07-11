<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
        $this->load->model('m_user');
	}
	
	public function index()
	{
		if($_POST) 
        {   
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('password','Password','trim|required');
            
            if($this->form_validation->run() == true)
            {
                $user = $this->m_user->checkUser($this->input->post('email'), $this->input->post('password'));

                if($user!=null)
                {
					// set session
					$this->session->set_userdata('login', true);
					$this->session->set_userdata('id', $user->id);
					$this->session->set_userdata('email', $user->email);

					redirect('dashboard');
                }
                else
                {
                        $this->session->set_userdata('pesan', '<p> Maaf, email/password Anda salah!</p>');
                        $this->session->set_userdata('status', 'danger');
                }
            }
            else
            {
                $this->session->set_userdata('pesan', 'Maaf , ada yang salah dengan inputan Anda');
                $this->session->set_userdata('status', 'danger');
            }
		}
		
		$data = array(
			'view'          => 'login/index',
			'title'         => 'Login as Admin',
		);

		$this->load->view('layout/frontend', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();

        $this->session->set_userdata('pesan', '<p> Signout Success </p>');
        $this->session->set_userdata('status', 'success');

        redirect('login');
	}
}
