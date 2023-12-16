<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartementModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllDepartement()
    {
        $sql = "SELECT
                d.idDepartement,
                d.nomDepartement,
                COUNT(e.idEmploye) AS nombreEmployes,
                MIN(e.nomEmploye) AS nomEmploye,
                MIN(e.prenomEmploye) AS prenomEmploye,
                MIN(e.salaire) AS salaireTotal
            FROM
                employe e
                    JOIN
                departement d ON d.idDepartement = e.idDepartement
            GROUP BY
                d.idDepartement";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getAllEmploye($idDept){
        $sql = "select * from employe where idDepartement = '$idDept'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}