<?php

namespace Oferta;

use Carbon\Carbon;
use Credite\PersoaneFizice;
use Credite\Produs;
use Illuminate\Support\Facades\View;

class CreateOfertaPdf
{
    protected $orientation  = 'L';
    protected $pagesize     = 'A4';
    protected $destionation = 'D';
    protected $data   = NULL;
    protected $redus        = false;

    public function __construct($orientation, $pagesize, $destionation, $data, $redus = false)
    {
        if( is_null($data) )
        {
            throw new \Exception("Nu există date pentru care să se genereze oferta");
        }
        $this->orientation  = $orientation;
        $this->pagesize     = $pagesize;
        $this->destionation = $destionation;
        $this->data   = $data;
        $this->redus        = $redus;
        $this->pdf          = new \ToPDF\topdf();
        $this->pdf->newpage($this->orientation, $this->pagesize);
        $this->pdf->Pdf()->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    }

    /*public function __call($method, $args)
    {
        $method = strtolower($method);
        if( array_key_exists($method, $attributes = $this->apartament->getAttributes()) )
        {
            return $attributes[$method];
        }
        throw new \Exception("Datele nu au proprietatea [$method]");
    }*/
    protected function fileName($save = false)
    {
        $file_name = str_replace('\\', '/', public_path() . '/app/oferte/oferta-export-' .\Carbon\Carbon::now()->format('d.m.Y H.i.s').'.pdf');
        $file_name = str_replace(' ', '_', $file_name);
        if($save){
            return $file_name;
        }
        return basename($file_name);
    }

    public function getName($attr = true)
    {
        return $this->fileName($attr);
    }

    protected function outlogo()
    {
        $logo_file = str_replace('\\', '/', storage_path() . '/app/apartamente/images/logo.png');
        $this->pdf->Pdf()->Image($logo_file, 10, 0, 70, 0, 'PNG', '', 'T', false, 308, '', false, false, 0, false, false, false);
        $this->pdf->Pdf()->SetFontSize(17);
        $this->pdf->cell()->text('Data ofertei: ' . \Carbon\Carbon::now()->format('d.m.Y'))->top(13)->left(220)->width(70)->halign('R')->out()->reset('top')->reset('left');
    }

    protected function outnume()
    {
        $oldFontSize = $this->pdf->Pdf()->getFontSizePt();
        $this->pdf->Pdf()->ln();
        $this->pdf->Pdf()->SetXY(20, 12);
        $this->pdf->Pdf()->SetFontSize(15);
        $this->pdf->Pdf()->SetTextColor(150, 200, 50);
        $nume = strtoupper( 'Oferta' );
        if( ! $nume )
        {
            $this->pdf->Pdf()->SetTextColor(255, 0, 0);
            $nume = 'Numele ofertei nu este definit';
        }
        $this->pdf->Cell()->text( $nume )->width(190)->border('')->halign('C')->out();
        $this->pdf->Pdf()->SetTextColor(0, 0, 0);
        $this->pdf->Pdf()->SetFontSize($oldFontSize);
    }

    protected function outWelcome(){
        $this->pdf->Pdf()->ln();
        $this->pdf->Pdf()->SetFontSize(11);
        $html = View::make('static.pdfwelcome')->with(['nume_client' => $this->data['general']['nume_client'] ])->render();
        $this->pdf->PDF()->writeHTML($html, true, 0, true, 0);
    }

    protected function outfieldcaptions(){
        $captions = [
            '1' => [ 'caption' => 'Banca',  'source' => 'banca', 'source' => 'banca'],
            '2' => [ 'caption' => 'Tipul Creditului', 'source' => 'tip_credit'],
            '3' => [ 'caption' => 'Perioada maxima de finantare (ani)', 'source' => 'perioada_max_finantare'],
            '4' => [ 'caption' => 'Perioada de finantare luata in calcul (ani)', 'source' => 'perioada_finantare_luata_in_calcul'],
            '5' => [ 'caption' => 'Suma solicitata', 'source' => 'suma_solicitata'],
            '6' => [ 'caption' => 'Suma maxima finantabila la care va incadrati, conform criteriilor de eligibilitate ale bancii', 'source' => 'suma_maxima_incadrare'],
            '7' => [ 'caption' => 'Valuta creditului', 'source' => 'valuta_creditului'],
            '8' => [ 'caption' => 'Dobanda preferentiala', 'source' => 'dobanda_preferentiala'],
            '9' => [ 'caption' => 'Tipul de dobanda', 'source' => 'tipul_de_dobanda'],
            '10' => [ 'caption' => 'Marja fixa practicata de banca', 'source' => 'marja_fixa_practicata_banca'],
            '11' => [ 'caption' => 'Tipul indicelui de referinta', 'source' => 'tip_indice_referinta'],
            '12' => [ 'caption' => 'Valoare la zi indice de referinta', 'source' => 'valoare_indice_zi_referinta'],
            '13' => [ 'caption' => 'Valoarea totala a dobanzii', 'source' => 'valoare_totala_dobanda'],
            '15' => [ 'caption' => 'Avans minim', 'source' => 'avans_minim'],
            '16' => [ 'caption' => 'Valoare avans minim', 'source' => 'valoare_avans_minim'],
            '17' => [ 'caption' => 'Valoare totala a investitiei', 'source' => 'valoare_totala_investitiei'],
            '18' => [ 'caption' => 'Comision de administrare', 'source' => 'comision_administrare'],
            '19' => [ 'caption' => 'Rata lunara inclusiv comisioane de gestiune/administrare', 'source' => 'rata_luanara_inclusiv_comision_gestionare'],
            '20' => [ 'caption' => 'Valoare comision de analiza', 'source' => 'valoare_comision_analiza'],
            '21' => [ 'caption' => 'Comision de acordare', 'source' => 'comision_acordare'],
            '22' => [ 'caption' => 'Valoare comision de acordare', 'source' => 'valoare_comision_acordare'],
            '23' => [ 'caption' => 'Valoarea estimata totala de rambursat', 'source' => 'valoare_estimata_rambursare'],
            '24' => [ 'caption' => 'D.A.E', 'source' => 'dae'],
            '25' => [ 'caption' => 'Taxa de evaluare a imobilului care se  aduce in garantie', 'source' => 'taxa_evaluare_imobil'],
            '26' => [ 'caption' => 'Taxele de înscriere în Arhiva Electronica de Garantii  Reale Mobiliare', 'source' => 'taxa_inscriere_arhiva'],
            '27' => [ 'caption' => 'Taxele notariale pentru: autentificarea ante-contractului', 'source' => 'taxe_notariale_ante_contract'],/*, contractului de vanzare sau de ipoteca  inclusiv taxe de intabulare*/
            '28' => [ 'caption' => 'Depozitul colateral format din trei rate', 'source' => 'depozit_colateral'],/* de dobanda (credit prima casa)*/
            '29' => [ 'caption' => 'Prima de asigurare a imobilului - taxa anuala', 'source' => 'prima_asigurare_imobil_anuala'],
            '30' => [ 'caption' => 'Valoare prima de asigurare imobil', 'source' => 'valoare_prima_asigurare_imobil'],
            '31' => [ 'caption' => 'Prima de asigurare a imobilului obligatorie PAD', 'source' => 'prima_asigurare_imobil_pad'],
            '32' => [ 'caption' => 'Prima de asigurare de viata - taxa anuala', 'source' => 'prima_asigurare_viata_anuala'],
            '33' => [ 'caption' => 'Valoare prima de asigurare', 'source' => 'valoare_prima_asigurare'],
            '34' => [ 'caption' => 'Comisionul de administrare platibil catre Fondul Nataional de Garantare a Creditelor', 'source' => 'comision_administrare_fond_national_anuala'],/* (credit Prima Casa) - taxa anuala*/
            '35' => [ 'caption' => 'Comision prestari servicii bancare', 'source' => 'comision_servicii_bancarea'],
            '36' => [ 'caption' => 'Comision de rambursare anticipata', 'source' => 'comision_rambursare_anticipata'],
            /*'37' => [ 'caption' => 'Alte comisioane ale bancii', 'source' => 'alte_comisioane_banca'],*/
        ];

        $this->pdf->Pdf()->SetFillColor(80, 191, 78);
        $this->pdf->Pdf()->SetTextColor(255);
        $this->pdf->Pdf()->SetDrawColor(80, 191, 78);
        $this->pdf->Pdf()->SetLineWidth(0.3);
        $this->pdf->Pdf()->SetFont('', 'B');
        $header = ['Denumire indicator'];
        /*TOTAL WIDTH ==> 260*/
        $w      = [60];
        for($i = 1; $i <= $this->data['general']['nr_oferte']; $i++){
            $header[] = "Oferta ".$i;
            $w[] = 200 / $this->data['general']['nr_oferte'];
        }

        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->pdf->Pdf()->Cell($w[$i], 6, $header[$i], 1, 0, 'C', 1);
//            $this->pdf->Pdf()->Cell(55 , 6, $header[$i], 1, 0, 'C', 1);
        }

        $this->pdf->Pdf()->Ln();
        // Color and font restoration
        $this->pdf->Pdf()->SetFillColor(224, 235, 255);
        $this->pdf->Pdf()->SetTextColor(0);
        $this->pdf->Pdf()->SetFont('');
        // Data
        $fill = 0;
        $data = [ [
            'edi','1','2'
        ] ];
        $count =  0;
        foreach($captions as $i => $row)
        {
            $count++;
            if($count % 14 == 0){
                $this->pdf->newpage($this->orientation, $this->pagesize);
            }
            $this->pdf->Pdf()->SetDrawColor(0,0,0);
            $this->pdf->Cell()->text( $row['caption'] )->width($w[0])->height(10)->border('1')->halign('L')->linefeed(0)->out();
            for($i = 1; $i <= $this->data['general']['nr_oferte']; $i++){
                $visible = $this->{$row['source']}($i);
                if( $visible !== null &&  $visible != '-1' ){
                    $this->pdf->Cell()->text( $visible )->width($w[$i])->border('1')->halign('L')->linefeed(0)->out();
                }

            }
            $fill=!$fill;
            $this->pdf->Pdf()->Ln();
        }
    }

    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 35, 40, 45);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    protected function outfooter()
    {
        $this->pdf->Pdf()->SetFont('freeserif', '', 9, '', false);
        $this->pdf->Pdf()->SetXY(10, -25);
        $this->pdf->Cell()->text('Contactatine la telefon 0756633766');
//        $this->pdf->Cell()->text('Pentru informaţii suplimentare sau alte oferte imobiliare mă puteţi contacta la telefon ' . $this->apartament->current_user->telefon . ', pe email ' . $this->apartament->current_user->email . ' sau la sediul nostru pe ' . str_replace([chr(13) . chr(10), chr(10) . chr(13), chr(10), chr(13)], ' ', $this->apartament->current_org->adresa) )->width(190)->border('T')->halign('C')->out()->reset('border')->reset('width')->reset('halign');
    }

    public function banca($i)
    {
//        dd($this->data['data']);
        return $this->comboval($this->data['data'][$i-1]['banca_'.$i], PersoaneFizice::getBanca());
    }

    public function tip_credit($i){
        return         @Produs::find($this->data['data'][$i-1]['tip_credit_'.$i])->nume;
    }

    public function perioada_max_finantare($i){
        return $this->data['data'][$i-1]['perioada_max_finantare_'.$i];
    }

    public function perioada_finantare_luata_in_calcul($i){
        return $this->data['data'][$i-1]['perioada_finantare_luata_in_calcul_'.$i];
    }

    public function suma_solicitata($i){
        return $this->data['data'][$i-1]['suma_solicitata_'.$i];
    }

    public function suma_maxima_incadrare($i){
        return $this->data['data'][$i-1]['suma_maxima_incadrare_'.$i];
    }

    public function valuta_creditului($i){

        return $this->comboval('valuta_creditului_'.$i,$this->data['data'][$i-1]);
    }

    public function dobanda_preferentiala($i){
        return $this->comboval('dobanda_preferentiala_'.$i,$this->data['data'][$i-1]);
    }

    public function tipul_de_dobanda($i){
        return $this->comboval('tipul_de_dobanda_'.$i,$this->data['data'][$i-1]);
    }

    public function marja_fixa_practicata_banca($i){
        return $this->data['data'][$i-1]['marja_fixa_practicata_banca_'.$i];
    }

    public function comboval($k, $a = [])
    {
        if($k == "? undefined:undefined ?")
            return '--';
        if( array_key_exists($k,$a) && $a[$k] != "? undefined:undefined ?"){
            return $a[$k];
        }else{
            return '--';
        }
    }

    public function tip_indice_referinta($i){
        return $this->comboval($this->data['data'][$i-1]['tip_indice_referinta_'.$i], PersoaneFizice::indice_referinta());
    }

    public function valoare_indice_zi_referinta($i){
        return $this->data['data'][$i-1]['valoare_indice_zi_referinta_'.$i];
    }

    public function valoare_totala_dobanda($i){
        return $this->data['data'][$i-1]['valoare_totala_dobanda_'.$i];
    }

    public function avans_minim($i){
        return $this->data['data'][$i-1]['avans_minim_'.$i];
    }

    public function valoare_avans_minim($i){
        return $this->data['data'][$i-1]['valoare_avans_minim_'.$i];
    }

    public function valoare_totala_investitiei($i){
        return $this->data['data'][$i-1]['valoare_totala_investitiei_'.$i];
    }

    public function comision_administrare($i){
        return $this->data['data'][$i-1]['comision_administrare_'.$i];
    }

    public function rata_luanara_inclusiv_comision_gestionare($i){
        return $this->data['data'][$i-1]['rata_luanara_inclusiv_comision_gestionare_'.$i];
    }

    public function valoare_comision_analiza($i){
        return $this->data['data'][$i-1]['valoare_comision_analiza_'.$i];
    }

    public function comision_acordare($i){
        return $this->data['data'][$i-1]['comision_acordare_'.$i];
    }

    public function valoare_comision_acordare($i){
        return $this->data['data'][$i-1]['valoare_comision_acordare_'.$i];
    }

    public function valoare_estimata_rambursare($i){
        return $this->data['data'][$i-1]['valoare_estimata_rambursare_'.$i];
    }

    public function dae($i){
        return $this->data['data'][$i-1]['dae_'.$i];
    }

    public function taxa_evaluare_imobil($i){
        return $this->data['data'][$i-1]['taxa_evaluare_imobil_'.$i];
    }

    public function taxa_inscriere_arhiva($i){
        return $this->data['data'][$i-1]['taxa_inscriere_arhiva_'.$i];
    }

    public function taxe_notariale_ante_contract($i){
        return $this->data['data'][$i-1]['taxe_notariale_ante_contract_'.$i];
    }

    public function depozit_colateral($i){
        return $this->data['data'][$i-1]['depozit_colateral_'.$i];
    }

    public function prima_asigurare_imobil_anuala($i){
        return $this->data['data'][$i-1]['prima_asigurare_imobil_anuala_'.$i];
    }

    public function valoare_prima_asigurare_imobil($i){
        return $this->data['data'][$i-1]['valoare_prima_asigurare_imobil_'.$i];
    }

    public function prima_asigurare_imobil_pad($i){
        return $this->data['data'][$i-1]['prima_asigurare_imobil_pad_'.$i];
    }

    public function prima_asigurare_viata_anuala($i){
        return $this->data['data'][$i-1]['prima_asigurare_viata_anuala_'.$i];
    }

    public function valoare_prima_asigurare($i){
        return $this->data['data'][$i-1]['valoare_prima_asigurare_'.$i];
    }

    public function comision_administrare_fond_national_anuala($i){
        return $this->data['data'][$i-1]['comision_administrare_fond_national_anuala_'.$i];
    }

    public function comision_servicii_bancarea($i){
        return $this->data['data'][$i-1]['comision_servicii_bancarea_'.$i];
    }

    public function comision_rambursare_anticipata($i){
        return $this->data['data'][$i-1]['comision_rambursare_anticipata_'.$i];
    }

    public function alte_comisioane_banca($i){
        return $this->data['data'][$i-1]['alte_comisioane_banca_'.$i];
    }


    protected function createpdf()
    {
        // Pagina 1
        $this->outlogo();
        $this->outnume();
        $this->outWelcome();
        $this->outfieldcaptions();

//        $this->outdetails();
        $this->outfooter();
    }

    public function Output()
    {
        $this->createpdf();
        $this->pdf->Pdf()->Output($this->fileName( $this->destionation == "F" || $this->destionation == "FI" ), $this->destionation);
    }
}