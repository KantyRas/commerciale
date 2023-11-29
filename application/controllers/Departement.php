<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function departements(){
        $this->load->view('accueil');
        $this->load->view('departement');
    }

    public function departement($idDepartement){
        $id = $idDepartement;
        $this->load->view('accueil');
        $this->load->view('infoDepartement',$id);
    }

    public function demande($id){
        $this->load->view('accueil');
        $this->load->view('demande');
    }
}
