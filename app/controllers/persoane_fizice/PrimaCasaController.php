<?php
namespace Credite\Datatable;
use Credite\PersoaneFizice;
class PrimaCasaController  extends \Datatable\DatatableController{
    protected $layout = 'template.layout';
    protected $tipClienti = [];
    public function __construct()
    {
        parent::__construct();

      $this->tipClienti = PersoaneFizice::getTipClient() + ['scadenta' => 'Scadenta'];
    }

    public function index($type = NULL, $edit = NULL){
        $config = \Credite\Grids::make('prima-casa')->toIndexConfig('prima-casa');
        $config['row-source'] .= $type ? '/'.$type  : '';
        $type == 'scadenta' ? $config['head_title'] = 'Data scadenta' : '';
        $config['breadcrumbs'] = [
            [
            'name' => 'Clienti',
            'url'  => "clienti-index",
            'ids' => ''
            ]  
        ];
        if($type){
            $config['breadcrumbs'] = [
                [
                'name' => 'Clienti',
                'url'  => "clienti-index",
                'ids' => ''
                ], 
                [
                'name' => $this->tipClienti[$type],
                'url'  => "clienti-index",
                'ids' => ['type' => $type]
                ]  
            ];
        }

        $config['right_menu'] = [ ['caption' => 'Adaugă persoana', 'class' => 'action-insert-record'],
                                  ['caption' => 'Trimite link', 'class' => 'generate-link'/*, 'action' => \URL::route('generate-link')*/] ];
        $this->show( $config + ['other-info' => [ 'current_org' => $this->current_org, 'edit' => $edit, 'scadenta' => ($type == 'scadenta') ]] );
    }

    public function rows($id, $type = NULL){
        $config = \Credite\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $type_client = $type ? ['tip_client' => 'persoane_fizice.tip_client = "'.$type.'"'] : [];
        if($type == 'scadenta'){
            $type_client = [ 'has_scadenta' => 'persoane_fizice.has_data_scadentei = 1' ];
        }
        $config['source']->custom_filters( $filters + [ 'persoana_fizica' => 'persoane_fizice.id_organizatie = '.$this->current_org->id ] + $type_client);
        return $this->dataset( $config );
    }
}