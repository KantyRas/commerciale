<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AchatModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ajoutFacture($num,$id,$date) {
        $sql = "insert into facture (numFacture,idFournisseur,dateFacture) values ('$num','$id','$date')";
        $this->db->query($sql);
    }

    public function getMaxIdComm() {
        $this->db->select_max('idComm');
        $query = $this->db->get('commande');
        return $query->row()->idComm;
    }

    public function insertAnnonce() {
        $idcomm = $this->getMaxIdComm();
        $sql = "insert into annonce (idComm) values ('$idcomm')";
        $this->db->query($sql);
    }

    public function getAllAnonce(){
        $sql = "SELECT dc.*, c.*
FROM annonce a
         JOIN commande c ON a.idComm = c.idComm
         JOIN detailCommande dc ON c.idComm = dc.idComm group by c.idComm";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getFacture($iddept,$idfourn,$num){
        $sql = "SELECT
    c.numComm,
    c.dateComm,
    d.idDepartement,
    d.nomDepartement,
    f.idFournisseur,
    f.nomFournisseur,
    dc.idDetail,
    a.designation,
    dc.quantiteComm,
    a.prixUnitaire,
    c.prixttc,
    c.prixht,
    c.prixtva,
    (dc.quantiteComm * a.prixUnitaire) AS montantTotal
FROM
    commande c
        JOIN
    detailCommande dc ON c.idComm = dc.idComm
        JOIN
    article a ON dc.idArticle = a.idArticle
        JOIN
    departement d ON c.idDepartement = d.idDepartement
        JOIN
    fournisseur f ON c.idFournisseur = f.idFournisseur
WHERE
                c.idDepartement = '$iddept'
  AND c.idFournisseur = '$idfourn'
  AND c.numComm = '$num'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getFactureByOne($iddept,$idfourn,$num){
        $sql = "SELECT
    c.numComm,
    c.dateComm,
    d.idDepartement,
    d.nomDepartement,
    f.idFournisseur,
    f.nomFournisseur,
    dc.idDetail,
    a.designation,
    dc.quantiteComm,
    a.prixUnitaire,
    c.prixttc,
    c.prixht,
    c.prixtva,
    (dc.quantiteComm * a.prixUnitaire) AS montantTotal
FROM
    commande c
        JOIN
    detailCommande dc ON c.idComm = dc.idComm
        JOIN
    article a ON dc.idArticle = a.idArticle
        JOIN
    departement d ON c.idDepartement = d.idDepartement
        JOIN
    fournisseur f ON c.idFournisseur = f.idFournisseur
WHERE
                c.idDepartement = '$iddept'
  AND c.idFournisseur = '$idfourn'
  AND c.numComm = '$num' LIMIT 1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}