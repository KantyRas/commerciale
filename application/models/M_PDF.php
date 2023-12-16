<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libraries/fpdf183/fpdf.php';

class M_PDF extends FPDF {
    function Header(){
        // En-tête du PDF
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Facture',0,1,'C');
        $this->Ln(10);
    }

    function Footer(){
        // Pied de page du PDF
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

    

    function AddCompanyDetails(){
        // Ajouter les détails de la société
        $this->SetFont('Arial','',12);
        $this->SetY(40);
        $this->Cell(0,10,'SEDERA',0,1,'L');
        $this->Cell(0,10,'Antananarivo 101',0,1,'L');
        $this->Cell(0,10,'0343914184',0,1,'L');
        $this->Cell(0,10,'Madagascar',0,1,'L');
        $this->Cell(0,10,'rabearisoasedera32@gmail.com',0,1,'L');
    }
    
    function AddInvoiceTable($header, $data){
        // Ajouter le tableau de la facture
        $this->Ln(10);
        $this->SetFillColor(200,220,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        foreach($header as $col){
            $this->Cell(45,10,$col,1,0,'C',true);
        }
        $this->Ln();

        $this->SetFont('');
        foreach($data as $row){
            foreach($row as $col){
                $this->Cell(45,10,$col,1);
            }
            $this->Ln();
        }
    }

    function AddTotalAmounts($totalHT, $tva, $totalTTC){
        // Ajouter les montants totaux
        $this->Ln(10);
        $this->Cell(0,10,'Total HT: '.$totalHT.' Ar',0,1,'L');
        $this->Cell(0,10,'TVA (20%): '.$tva.' Ar',0,1,'L');
        $this->Cell(0,10,'Total TTC: '.$totalTTC.' Ar',0,1,'L');
    }

    function AddClientAndCompanySignatures($companySignature){
        // Ajouter les signaturesde la société
        $this->Ln(20);
        $this->SetFont('Arial','',12);
        $this->Cell(0,10,'Le Société',0,1,'L');
        $this->Cell(0,10,$companySignature,0,1,'L');
    }
}
?>
