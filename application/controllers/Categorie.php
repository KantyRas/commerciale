<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function categories(){
        $this->load->view('accueil');
        $this->load->view('categorie');
    }
    public function ajout(){
        $this->load->view('accueil');
        $this->load->view('ajoutCategorie');
    }
}