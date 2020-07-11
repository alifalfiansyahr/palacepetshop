<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $total = $this->m_product->listProductTotal($cari);
        $rec = $this->m_product->listProduct($this->limit, $offset, $cari);
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'product/index';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $total;
        $config['per_page'] = $this->limit;
        $config['num_links'] = 4;

        $config['first_tag_open'] = '<li>';
        $config['first_link'] = '&lt;&lt;';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        
        $data = array(
                'view'              => 'product/index',
                'js'                => array(),
                'css'               => array(),
                'title'             => 'Produk',
                'rec'		        => $rec,
                'paging'            => $this->pagination->create_links(),
                'totalProduk'       => $this->m_product->totalProduk(),
                'cari'              => $cari
        );

        $this->load->view('layout/backend', $data);
    }

    public function create()
    {
        if($_POST) 
        { 
            // echo '<pre>';print_r($_POST);print_r($_FILES['photo']);die();

            $category_id = $this->input->post('category_id');
            $code = $this->input->post('code');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $unit_id = $this->input->post('unit_id');
            $stock = $this->input->post('stock');
            $stock_wh = $this->input->post('stock_wh');
            $nominal = $this->input->post('nominal');
            $homepage = $this->input->post('homepage');
            $slug = slug($code.'-'.$name);
            $created_date = date("Y-m-d H:i:s");

            $dt = array(
                'category_id'       => $category_id,
                'code'              => $code,
                'name'              => $name,
                'description'       => $description,
                'active'            => true,
                'unit_id'           => $unit_id,
                'stock'             => $stock,
                'stock_wh'          => $stock_wh,
                'homepage'          => $homepage,
                'slug'              => $slug,
                'created_date'      => $created_date,
            );
            $product_id = $this->m_product->insertProduct($dt);
            
            if ($product_id != null) 
            {
                // insert price
                $pr = array(
                    'product_id'        => $product_id,
                    'nominal'           => $nominal,
                    'updated_date'      => $created_date,
                );
                $this->m_product->insertPrice($pr);

                // upload photo
                if(count($_FILES['photo']) > 0)
                {
                    $config['upload_path']          = './photo/product/';
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
                    else
                    {
                        $dt2 = array(
                            'product_id'   => $product_id,
                            'files'         => $this->upload->data('file_name')
                        );
                        $this->m_product->insertPhoto($dt2);
                    }

                    $error = ($error!='') ? '<br />Upload File Failed : '.$error : '';
                }
                

                $this->session->set_userdata('pesan', 'New Product Succes Saved.'.$error);
                $this->session->set_userdata('status', 'success');
                redirect(base_url() . 'product/detail/' . $slug);
                
            } 
            else 
            {
                $this->session->set_userdata('pesan', 'Sorry, Please try again.');
                $this->session->set_userdata('status', 'danger');
            }
        }

        $data = array(
            'view'          => 'product/create',
            'js'            => array(''),
            'css'           => array(''),
            'title'         => 'Produk Baru',
            'recCategory'   => $this->m_product->listCategory(),
            'recUnit'       => $this->m_product->listUnit(),
        );

        $this->load->view('layout/backend', $data);
    }

    public function edit($slug)
    {
        $rec = $this->m_product->getProductByAdmin($slug);
        // echo $slug;die();
        // echo '<pre>';print_r($rec);print_r($_FILES['photo']);
        // die();

        if($rec==null)
            redirect('notfound');

        if($_POST) 
        {
            $category_id = $this->input->post('category_id');
            $code = $this->input->post('code');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $active = $this->input->post('active');
            $unit_id = $this->input->post('unit_id');
            $stock = $this->input->post('stock');
            $stock_wh = $this->input->post('stock_wh');
            $nominal = $this->input->post('nominal');
            $homepage = $this->input->post('homepage');
            $slug = slug($code.'-'.$name);
            $updated_date = date("Y-m-d H:i:s");

            $dt = array(
                'category_id'       => $category_id,
                'code'              => $code,
                'name'              => $name,
                'description'       => $description,
                'active'            => $active,
                'unit_id'           => $unit_id,
                'stock'             => $stock,
                'stock_wh'          => $stock_wh,
                'homepage'          => $homepage,
                'slug'              => $slug,
                'updated_date'      => $updated_date,
            );
            $this->m_product->updateProduct($dt, $rec->id);
            
            if($rec->price != $nominal) 
            {
                // insert price
                $pr = array(
                    'product_id'        => $rec->id,
                    'nominal'           => $nominal,
                    'updated_date'      => $updated_date,
                );
                $this->m_product->insertPrice($pr);
            }
            
            // upload photo
            if($_FILES['photo']['name']!='')
            {
                $config['upload_path']          = './photo/product/';
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
                else
                {
                    if(file_exists('photo/product/'.$rec->photo))
                    {
                        $this->m_product->deletePhoto($rec->id);

                        unlink('photo/product/'.$rec->photo);
                    }

                    $dt2 = array(
                        'product_id'   => $rec->id,
                        'files'         => $this->upload->data('file_name')
                    );
                    $this->m_product->insertPhoto($dt2);
                }

                $error = ($error!='') ? '<br />Upload File Failed: '.$error : '';
            }
            

            $this->session->set_userdata('pesan', 'Product Succes Updated.'.$error);
            $this->session->set_userdata('status', 'success');
            redirect(base_url() . 'product/detail/' . $rec->slug);
        }

        $data = array(
            'view'          => 'product/edit',
            'js'            => array(''),
            'css'           => array(''),
            'title'         => 'Edit Produk',
            'rec'           => $rec,
            'recCategory'   => $this->m_product->listCategory(),
            'recUnit'       => $this->m_product->listUnit(),
        );

        $this->load->view('layout/backend', $data);
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

        $config['first_tag_open'] = '<li>';
        $config['first_link'] = '&lt;&lt;';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        
        $data = array(
                'view'              => 'product/category',
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
                'title'         => $rec->name,
                'rec'		    => $rec,
                'recRelated'    => $this->m_product->getRelatedProduk($rec->name, $rec->id),
        );

        $this->load->view('layout/frontend', $data);
    }

    public function detail($slug)
    {
        $rec = $this->m_product->getProductByAdmin($slug);
        
        if($rec==null)
            redirect('notfound');
        
        $data = array(
                'view'          => 'product/detail',
                'js'            => array(),
                'css'           => array(),
                'title'         => $rec->name,
                'rec'		    => $rec,
                'recRelated'    => $this->m_product->getRelatedProduk($rec->name, $rec->id),
        );

        $this->load->view('layout/backend', $data);
    }
}
