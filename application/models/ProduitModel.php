<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProduitModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllProduit(){
        $sql = "select * from article";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getProduitById($id){
        $sql = "select * from article where idFournisseur='$id'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}