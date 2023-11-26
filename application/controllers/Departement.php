<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departement extends CI_Controller
{
    public function __construct()
    {

    }

    public function departements(){
        $this->load->view('accueil');
        $this->load->view('departement');
    }
}
