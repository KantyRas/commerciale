<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FournisseurModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllFournisseur(){
        $sql = "select * from fournisseur";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}