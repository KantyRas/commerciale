<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function produits(){
        $this->load->model('ProduitModel');
        $data['articles'] = $this->ProduitModel->getAllProduit();
        $this->load->view('accueil');
        $this->load->view('produit',$data);
    }

    public function ajout(){
        $this->load->view('accueil');
        $this->load->view('ajoutProduit');
    }
}