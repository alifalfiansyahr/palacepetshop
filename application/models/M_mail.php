<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mail extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database('default');
    }

    function getMail($id)
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from('mail');
        $this->db->where("id", $id);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->row();
        else
            return null;
    }

    function listMailTotal()
    {
        $this->db->select('count(id) as jml');
        $this->db->from('mail');
        $rec = $this->db->get();
        
        return $rec->row()->jml;
    }

    function listMail($limit, $offset)
    {
        $this->db->select("*");
        $this->db->from('mail');
        $this->db->order_by("id desc");
        $this->db->limit($limit, $offset);
        $rec = $this->db->get();
        
        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function listAllMail()
    {
        $this->db->select('*');
        $this->db->from('mail');
        $rec = $this->db->get();

        if ($rec->num_rows() > 0)
            return $rec->result();
        else
            return null;
    }

    function insertMail($rec)
    {
        $this->db->insert('mail', $rec);
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