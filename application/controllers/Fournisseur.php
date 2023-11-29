<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fournisseur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fournisseurs(){
        $this->load->view('accueil');
        $this->load->view('fournisseur');
    }
    public function ajout(){
        $this->load->view('accueil');
        $this->load->view('ajoutFournisseur');
    }
}