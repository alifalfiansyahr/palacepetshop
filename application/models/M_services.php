<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_services extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database('default');
    }

    function getServiceByAdmin($slug)
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from('services');
        $this->db->where("slug", $slug);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->row();
        else
            return null;
    }

    function listServicesTotal($cari)
    {
        $this->db->select('count(id) as jml');
        $this->db->from('services');
        if($cari!='')
            $this->db->like("title", $cari);
        $rec = $this->db->get();
        
        return $rec->row()->jml;
    }

    function listServices($limit, $offset, $cari)
    {
        $this->db->select("*");
        $this->db->from('services');
        if($cari!='')
            $this->db->like("title", $cari);
        $this->db->order_by('id desc');
        $this->db->limit($limit, $offset);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function listAllServices()
    {
        $this->db->select('*');
        $this->db->from('services');
        $this->db->order_by('id');
        $rec = $this->db->get();

        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function insertService($rec)
    {
        $this->db->insert('services', $rec);
        return $this->db->insert_id();
    }

    function updateService($rec, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('services', $rec);
    }
    
    function getAbout()
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from('about');
        $this->db->where("id", 1);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->row();
        else
            return null;
    }

    function updateAbout($rec)
    {
        $this->db->where('id', 1);
        $this->db->update('about', $rec);
    }
}