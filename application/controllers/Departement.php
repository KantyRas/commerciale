<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function departements(){
        $this->load->model('DepartementModel');
        $data['depts'] = $this->DepartementModel->getAllDepartement();
        $this->load->view('accueil');
        $this->load->view('departement',$data);
    }

    public function departement(){
        $id = $this->input->get('iddepartement');
        $this->load->model('DepartementModel');
        $data['emps'] = $this->DepartementModel->getAllEmploye($id);
        $this->load->view('accueil');
        $this->load->view('infoDepartement',$data);
    }

    public function demande($id){
        $this->load->view('accueil');
        $this->load->view('demande');
    }
}
