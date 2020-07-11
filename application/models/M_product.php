<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_product extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database('default');
    }

    function listCategory()
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from('category');
        $this->db->order_by('id');
        $rec = $this->db->get();

        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function listProductHome()
    {
        $this->db->distinct();
        $this->db->select("p.id, p.name, p.slug, u.name as unit, 
                            (select nominal from price where product_id=p.id order by id desc limit 1) as price, 
                            (select files from photo where product_id=p.id order by id limit 1) as photo");
        $this->db->from('product as p');
        $this->db->join('unit as u', 'p.unit_id=u.id', 'left');
        $this->db->where("p.homepage", true);
        $this->db->where("p.active", true);
        $this->db->order_by('p.id');
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function getRelatedProduk($nama, $id)
    {
        $where = "";
        $tmp = explode(' ', $nama);
        for($i=0;$i<count($tmp);$i++)
        {
            $where .= "p.name like '%".$tmp[$i]."%'";
            if($i < count($tmp)-1)
                $where .= " or ";
        }

        $this->db->select("p.id, p.name, p.slug, u.name as unit, 
                            (select nominal from price where product_id=p.id order by id desc limit 1) as price, 
                            (select files from photo where product_id=p.id order by id limit 1) as photo");
        $this->db->from('product as p');
        $this->db->join('unit as u', 'p.unit_id=u.id', 'left');
        $this->db->where("p.active", true);
        $this->db->where("(".$where.")");
        $this->db->where("p.id!=".$id);
        $this->db->order_by('p.id');
        $this->db->limit(4);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function listCategoryProductTotal($slug)
    {
        $this->db->select('count(p.id) as jml');
        $this->db->from('product as p');
        $this->db->join('category as c', 'p.category_id=c.id', 'left');
        if($slug!='all')
            $this->db->where("c.slug", $slug);
        $this->db->where("active", true);
        $rec = $this->db->get();
        
        return $rec->row()->jml;
    }

    function listCategoryProduct($slug, $limit, $offset)
    {
        $this->db->select("p.id, p.name, p.slug, u.name as unit, c.name as category_name, 
                            (select nominal from price where product_id=p.id order by id desc limit 1) as price, 
                            (select files from photo where product_id=p.id order by id limit 1) as photo");
        $this->db->from('product as p');
        $this->db->join('unit as u', 'p.unit_id=u.id', 'left');
        $this->db->join('category as c', 'p.category_id=c.id', 'left');
        if($slug!='all')
            $this->db->where("c.slug", $slug);
        $this->db->where("active", true);
        $this->db->order_by('p.id desc');
        $this->db->limit($limit, $offset);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function getProductBySlug($slug)
    {
        $this->db->distinct();
        $this->db->select("p.id, p.code, p.name, p.description, p.slug, p.unit_id, u.name as unit, stock, stock_wh, homepage, 
                            p.category_id, c.name as category_name, 
                            (select nominal from price where product_id=p.id order by id desc limit 1) as price, 
                            (select files from photo where product_id=p.id order by id limit 1) as photo");
        $this->db->from('product as p');
        $this->db->join('category as c', 'p.category_id=c.id', 'left');
        $this->db->join('unit as u', 'p.unit_id=u.id', 'left');
        $this->db->where("p.active", true);
        $this->db->where("p.slug", $slug);
        $this->db->order_by('p.id');
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->row();
        else
            return null;
    }

    function getProductByAdmin($slug)
    {
        $this->db->distinct();
        $this->db->select("p.id, p.code, p.name, p.description, p.slug, p.unit_id, u.name as unit, stock, stock_wh, homepage, 
                            p.category_id, c.name as category_name, active, 
                            (select nominal from price where product_id=p.id order by id desc limit 1) as price, 
                            (select files from photo where product_id=p.id order by id limit 1) as photo");
        $this->db->from('product as p');
        $this->db->join('category as c', 'p.category_id=c.id', 'left');
        $this->db->join('unit as u', 'p.unit_id=u.id', 'left');
        $this->db->where("p.slug", $slug);
        $this->db->order_by('p.id');
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->row();
        else
            return null;
    }

    function listProductTotal($cari)
    {
        $this->db->select('count(p.id) as jml');
        $this->db->from('product as p');
        $this->db->join('category as c', 'p.category_id=c.id', 'left');
        if($cari!='')
            $this->db->like("p.name", $cari);
        $rec = $this->db->get();
        
        return $rec->row()->jml;
    }

    function listProduct($limit, $offset, $cari)
    {
        $this->db->select("p.id, p.name, p.description, p.slug, u.name as unit, c.name as category_name, p.stock, p.stock_wh, 
                            (select nominal from price where product_id=p.id order by id desc limit 1) as price, 
                            (select files from photo where product_id=p.id order by id limit 1) as photo");
        $this->db->from('product as p');
        $this->db->join('unit as u', 'p.unit_id=u.id', 'left');
        $this->db->join('category as c', 'p.category_id=c.id', 'left');
        if($cari!='')
            $this->db->like("p.name", $cari);
        $this->db->order_by('p.id desc');
        $this->db->limit($limit, $offset);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function totalProduk()
    {
        $this->db->select('count(p.id) as jml');
        $this->db->from('product as p');
        $rec = $this->db->get();
        
        return $rec->row()->jml;
    }

    function listUnit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        $rec = $this->db->get();

        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function insertProduct($rec)
    {
        $this->db->insert('product', $rec);
        return $this->db->insert_id();
    }

    function insertPrice($rec)
    {
        $this->db->insert('price', $rec);
        return $this->db->insert_id();
    }
    
    function insertPhoto($rec)
    {
        $this->db->insert('photo', $rec);
        return $this->db->insert_id();
    }

    function updateProduct($rec, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('product', $rec);
    }

    function deletePhoto($product_id)
    {
        $this->db->where('product_id', $product_id);
        $this->db->delete('photo');
    }
}