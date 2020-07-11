<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_mail');
    }

    public function index()
    {
        if($_POST) 
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $date = date('Y-m-d H:i:s');
            
            $dt = array(
                'name'          => $name,
                'email'         => $email,
                'subject'       => $subject,
                'message'       => $message,
                'date'          => $date,
            );
            $this->m_mail->insertMail($dt);

            $this->session->set_userdata('pesan', 'Terima kasih telah menghubungi kami.<br />Kami akan segera membalas pesan Anda.');
            $this->session->set_userdata('status', 'success');
            redirect(base_url() . 'contact');
        }

        $data = array(
            'view'          => 'contact/index',
            'title'         => 'Hubungi Kami',
        );

        $this->load->view('layout/frontend', $data);
    }

    var $limit = 12;

    public function admin($offset = 0)
    {
        $uri_segment=3;
        $offset=$this->uri->segment($uri_segment);
        if(!is_numeric($offset))
            $offset=0;
        if($offset<0)
            $offset=0;

        $total = $this->m_mail->listMailTotal();
        $rec = $this->m_mail->listMail($this->limit, $offset);
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'contact/admin';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $total;
        $config['per_page'] = $this->limit;
        $config['num_links'] = 4;

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url'] = '&lt;';
        $config['prev_link'] = '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>';
        $config['next_link'] = '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        
        $this->pagination->initialize($config);
        
        $data = array(
                'view'              => 'contact/admin',
                'js'                => array(),
                'css'               => array(),
                'title'             => 'Hubungi Kami',
                'rec'		        => $rec,
                'paging'            => $this->pagination->create_links()
        );

        $this->load->view('layout/backend', $data);
    }

    public function detail($id)
    {
        $rec = $this->m_mail->getMail($id);
        
        if($rec==null)
            redirect('notfound');
        
        $data = array(
                'view'          => 'contact/detail',
                'title'         => 'Detail Email',
                'rec'		    => $rec,
        );

        $this->load->view('layout/backend', $data);
    }
}
