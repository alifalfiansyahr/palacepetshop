<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_services');
    }

    var $limit = 12;

    public function index($offset = 0)
    {
        $uri_segment=3;
        $offset=$this->uri->segment($uri_segment);
        if(!is_numeric($offset))
            $offset=0;
        if($offset<0)
            $offset=0;

        $cari = '';
        $total = $this->m_services->listServicesTotal($cari);
        $rec = $this->m_services->listServices($this->limit, $offset, $cari);
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'services/index';
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
                'view'              => 'services/index',
                'js'                => array(),
                'css'               => array(),
                'title'             => 'Layanan',
                'rec'		        => $rec,
                'paging'            => $this->pagination->create_links(),
                'cari'              => $cari
        );

        $this->load->view('layout/backend', $data);
    }

    public function create()
    {
        if($_POST) 
        { 
            // echo '<pre>';print_r($_POST);print_r($_FILES['photo']);die();

            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $slug = slug($title);

            // upload photo
            $error="";
            if(count($_FILES['photo']) > 0)
            {
                $config['upload_path']          = './photo/services/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 10240; // 10 MB
                $config['file_name']            = $_FILES['photo']['name'];
            
                $this->load->library('upload');
                $this->upload->initialize($config);

                $error="";
                $suksesUpload = true;            

                if ( ! $this->upload->do_upload('photo')) // jika error upload foto
                {
                    $suksesUpload = false;
                    $error = $this->upload->display_errors();
                }

                $error = ($error!='') ? '<br />Upload File Failed : '.$error : '';
            }

            $dt = array(
                'title'             => $title,
                'content'           => $content,
                'image'             => (count($_FILES['photo']) > 0 && $error=='') ? $this->upload->data('file_name') : null,
                'slug'              => $slug
            );
            $this->m_services->insertService($dt);

            $this->session->set_userdata('pesan', 'New Service Succes Saved.'.$error);
            $this->session->set_userdata('status', 'success');
            redirect(base_url() . 'services/detail/' . $slug);
        }

        $data = array(
            'view'          => 'services/create',
            'title'         => 'Layanan Baru',
        );

        $this->load->view('layout/backend', $data);
    }

    public function edit($slug)
    {
        $rec = $this->m_services->getServiceByAdmin($slug);
        // echo $slug;die();
        // echo '<pre>';print_r($rec);print_r($_FILES['photo']);
        // die();

        if($rec==null)
            redirect('notfound');

        if($_POST) 
        {
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $slug = slug($title);

            // upload photo
            $error="";
            if($_FILES['photo']['name']!='')
            {
                $config['upload_path']          = './photo/services/';
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
                    if(file_exists('photo/services/'.$rec->image))
                    {
                        unlink('photo/services/'.$rec->image);
                    }
                }

                $error = ($error!='') ? '<br />Upload File Failed: '.$error : '';
            }

            $dt = array(
                'title'             => $title,
                'content'           => $content,
                'image'             => ($_FILES['photo']['name']!='' && $error=='') ? $this->upload->data('file_name') : $rec->image,
                'slug'              => $slug
            );
            $this->m_services->updateService($dt, $rec->id);

            $this->session->set_userdata('pesan', 'Service Succes Updated.'.$error);
            $this->session->set_userdata('status', 'success');
            redirect(base_url() . 'services/detail/' . $rec->slug);
        }

        $data = array(
            'view'          => 'services/edit',
            'title'         => 'Edit Layanan',
            'rec'           => $rec,
        );

        $this->load->view('layout/backend', $data);
    }

    public function view($slug)
    {
        $rec = $this->m_services->getServiceByAdmin($slug);
        
        if($rec==null)
            redirect('notfound');
        
        $data = array(
                'view'          => 'services/view',
                'title'         => $rec->title,
                'rec'		    => $rec,
        );

        $this->load->view('layout/frontend', $data);
    }

    public function detail($slug)
    {
        $rec = $this->m_services->getServiceByAdmin($slug);
        
        if($rec==null)
            redirect('notfound');
        
        $data = array(
                'view'          => 'services/detail',
                'title'         => $rec->title,
                'rec'		    => $rec,
        );

        $this->load->view('layout/backend', $data);
    }
}
