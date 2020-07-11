<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_services');
    }

    public function edit()
    {
        $rec = $this->m_services->getAbout();
        
        if($rec==null)
            redirect('notfound');

        if($_POST) 
        {
            $content = $this->input->post('content');
            
            // upload photo
            $error="";
            if($_FILES['photo']['name']!='')
            {
                $config['upload_path']          = './photo/about/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 10240; // 10 MB
                $config['file_name']            = $_FILES['photo']['name'];
            
                $this->load->library('upload');
                $this->upload->initialize($config);

                $suksesUpload = true;            

                if ( ! $this->upload->do_upload('photo')) // jika error upload foto
                {
                    $suksesUpload = false;
                    $error = $this->upload->display_errors();
                }
                else
                {
                    if(file_exists('photo/about/'.$rec->image))
                    {
                        unlink('photo/about/'.$rec->image);
                    }
                }

                $error = ($error!='') ? '<br />Upload File Failed: '.$error : '';
            }

            $dt = array(
                'content'           => $content,
                'image'             => ($_FILES['photo']['name']!='' && $error=='') ? $this->upload->data('file_name') : $rec->image,
                'updated_date'      => date('Y-m-d H:i:s')
            );
            $this->m_services->updateAbout($dt);

            $this->session->set_userdata('pesan', 'About Page Succes Updated.'.$error);
            $this->session->set_userdata('status', 'success');
            redirect(base_url() . 'about/edit');
        }

        $data = array(
            'view'          => 'about/edit',
            'title'         => 'Tentang Kami',
            'rec'           => $rec,
        );

        $this->load->view('layout/backend', $data);
    }

    public function index()
    {
        $rec = $this->m_services->getAbout();
        
        if($rec==null)
            redirect('notfound');
        
        $data = array(
                'view'          => 'about/view',
                'title'         => '',
                'rec'		    => $rec,
        );

        $this->load->view('layout/frontend', $data);
    }

}
