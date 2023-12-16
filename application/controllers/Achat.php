<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Achat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadAchat(){
        $this->load->model('FournisseurModel');
        $data['fournisseurs'] = $this->FournisseurModel->getAllFournisseur();
        $this->load->view('accueil');
        $this->load->view('achat',$data);
    }
    public function loadFormFacture(){
        $this->load->model('DepartementModel');
        $data['depts'] = $this->DepartementModel->getAllDepartement();
        $idf = $this->input->get('idfournisseur');
        $data['idf'] = $idf;
        $this->load->view('accueil');
        $this->load->view('facturation',$data);
    }

    public function loadSaisieDemande($data){
        $this->load->model('ProduitModel');
        $this->load->view('accueil');
        $data['produits'] = $this->ProduitModel->getProduitById($data['idf']);
        $iddept=$this->input->get('iddept');
        $num = $this->input->get('num');
        $datef=$this->input->get('datefacture');
        $data['iddept'] = $iddept;
        $data['num'] = $num;
        $data['datef'] = $datef;
        $this->load->view('saisieBesoin',$data);
    }
    public function ajoutValeurFacture(){
        $this->load->model('AchatModel');
        $com_fourn = $this->input->post("idFournisseur");
        $dept = $this->input->post('idDept');
        date_default_timezone_set('Europe/Paris');
        $com_date = $this->input->post("datef");
        $numComm = $this->input->post("num");
        $com_ttc = $this->input->post("total_com");
        $com_ht = ($com_ttc/120)*100;
        $com_tva = $com_ttc-$com_ht;

        $texte_com = $this->input->post("chaine_com");
        $tab_com = explode('|', $texte_com);

        $this->db->trans_start();

        $commande_data = array(
            'idDepartement' => $dept,
            'idFournisseur' => $com_fourn,
            'numComm' => $numComm,
            'dateComm' => $com_date,
            'prixttc' => $com_ttc,
            'prixht' => $com_ht,
            'prixtva' => $com_tva
        );
        $this->db->insert('commande', $commande_data);
        $detail_com = $this->db->insert_id();

        foreach ($tab_com as $ligne_com) {
            if (!empty($ligne_com)) {
                $ligne_com = explode(';', $ligne_com);
                $detail_data = array(
                    'idComm' => $detail_com,
                    'idArticle' => $ligne_com[0],
                    'quantiteComm' => $ligne_com[1]
                );
                $this->db->insert('detailCommande', $detail_data);
                $this->db->set('quantite', 'quantite-' . $ligne_com[1], false);
                $this->db->where('idArticle', $ligne_com[0]);
                $this->db->update('article');
            }
        }
        //$this->AchatModel->insertAnnonce();
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
        //redirect('Annonce/annonces');
        } else {
            echo "Insertion non validé";
        }
    }
    public function ajout(){
        $num = $this->input->post('num');
        $idf = $this->input->get('idfournisseur');
        $datef =  $this->input->post('datefacture');
        $iddept = $this->input->post('iddept');

        $data['idf'] = $idf;
        $this->load->model('AchatModel');
        /*if (!empty($datef)) {
            $this->AchatModel->ajoutFacture($num,$idf,$datef);
        }*/
        $this->loadSaisieDemande($data);
    }
}