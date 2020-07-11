<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myproduct extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_product');
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
        $kabupaten_id = '';
        $kabupaten_nama = '';
        if($_POST)
        {
            $cari = $this->input->post('cari');
            $kabupaten_id = $this->input->post('kabupaten_id');
            $kabupaten_nama = $this->input->post('kabupaten_nama');
        }
        
        $total = $this->m_product->listProductTotal($cari, $kabupaten_id);
        $rec = $this->m_product->listProduct($this->limit, $offset, $cari, $kabupaten_id);
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'product/index';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $total;
        $config['per_page'] = $this->limit;
        $config['num_links'] = 4;

        // $config['next_tag_open'] = '<a href="#" class="next-arrow">';
        $config['prev_link'] = '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>';
        $config['next_link'] = '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        
        $data = array(
                'view'              => 'product/index',
                'js'                => array(),
                'css'               => array(),
                'title'             => 'Produk - Tastivo',
                'rec'		        => $rec,
                'paging'            => $this->pagination->create_links(),
                'recJenisProduk'    => $this->m_product->menuJenisProduk(),
                'totalProduk'       => $this->m_product->totalProduk(),
                'cari'              => $cari,
                'kabupaten_id'      => $kabupaten_id,
                'kabupaten_nama'    => $kabupaten_nama
        );

        $this->load->view('layout/frontend', $data);
    }

    public function category($slug = '', $offset = 0)
    {
        $uri_segment=4;
        $offset=$this->uri->segment($uri_segment);
        if(!is_numeric($offset))
            $offset=0;
        if($offset<0)
            $offset=0;

        $total = $this->m_product->listCategoryProductTotal($slug);
        $rec = $this->m_product->listCategoryProduct($slug, $this->limit, $offset);
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'product/category/'.$slug;
        $config['uri_segment'] = 4;
        $config['total_rows'] = $total;
        $config['per_page'] = $this->limit;
        $config['num_links'] = 4;

        // $config['next_tag_open'] = '<a href="#" class="next-arrow">';
        $config['prev_link'] = '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>';
        $config['next_link'] = '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        
        $data = array(
                'view'              => 'product/index',
                'js'                => array(),
                'css'               => array(),
                'title'             => 'Product - Palace Petshop',
                'rec'		        => $rec,
                'paging'            => $this->pagination->create_links(),
                'slug'              => $slug,
                'category'          => ucwords(str_replace('-', ' ', str_replace('.html', '', $slug))),
        );

        $this->load->view('layout/frontend', $data);
    }

    public function view($slug)
    {
        $rec = $this->m_product->getProductBySlug($slug);
        
        if($rec==null)
            redirect('notfound');
        
        $data = array(
                'view'          => 'product/view',
                'js'            => array(),
                'css'           => array(),
                'title'         => $rec->name.' - Tastivo',
                'rec'		    => $rec,
                'recRelated'    => $this->m_product->getRelatedProduk($rec->name, $rec->id),
        );

        $this->load->view('layout/frontend', $data);
    }
}
