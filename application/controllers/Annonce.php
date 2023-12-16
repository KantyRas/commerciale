<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Annonce extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function annonces(){
        $this->load->model('AchatModel');
        $data['annonces'] = $this->AchatModel->getAllAnonce();
        $this->load->view('accueil');
        $this->load->view('annonce',$data);
    }
    
    public function getProFormat($iddept,$idfourn,$num){
        $this->load->model('AchatModel');
        $data['factures'] = $this->AchatModel->getFacture($iddept,$idfourn,$num);
        $data['facturess'] = $this->AchatModel->getFactureByOne($iddept,$idfourn,$num);
        
        $this->load->view('accueil');
        $this->load->view('facture',$data);
    }
    
    public function getpdf(){
        $this->load->model('M_PDF');
    
        $invoiceNumber = 'fac/001';

        // En-têtes de la facture
        $header = array('Description', 'Quantité', 'Prix Unitaire', 'Montant');
    
        // Données de la facture
        $data = array(
            array('Produit 1', 2, 50, 100),
            array('Produit 2', 1, 75, 75),
            array('Produit 3', 3, 30, 90),
        );

        // Montants totaux
        $totalHT = 265;
        $tva = 53;
        $totalTTC = 318;

        // Signatures
        $companySignature = 'BALLOU';

        // Création de l'objet PDF
        $pdf = new M_PDF();
        $pdf->AddPage();

        // Ajouter les éléments de la facture (sans le logo)
        $pdf->AddCompanyDetails();
        $pdf->AddInvoiceTable($header, $data);
        $pdf->AddTotalAmounts($totalHT, $tva, $totalTTC);
        $pdf->AddClientAndCompanySignatures( $companySignature);

        // Afficher le PDF dans le navigateur
        $pdf->Output('I', 'invoice.pdf');
    }
    
}