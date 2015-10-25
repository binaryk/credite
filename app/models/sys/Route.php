<?php

namespace Imobile;

class Route {

	protected static $instance = NULL;
	protected $routes = [];

	public function __construct() {
		$this
		/* Database general operations */
			->add('get', 'home', '/', 'HomeController@showWelcome', '')
			->add('get', 'lock', 'loock', 'HomeController@lockScreen', '')

			/**
		IMOBILE
		 **/

			->add('get', 'datatable-index', 'nomenclatoare/{id}', 'DatatableController@index', 'Imobiliare\Datatable')
			->add('get', 'datatable-row-source', 'nomenclatoare/row-source/{id}', 'DatatableController@rows', 'Imobiliare\Datatable')
			->add('post', 'datatable-load-form', 'nomenclatoare/load-dt-form/{id}', 'DatatableController@loadForm', 'Imobiliare\Datatable')
			->add('post', 'datatable-do-action', 'nomenclatoare/dt-do-action/{id}', 'DatatableController@doAction', 'Imobiliare\Datatable')

/**
Date de baza
 **/
			->add('get', 'judet_localitate_index', 'nomenclatoare/{id}/{judet_id}', 'JudetController@index', 'Imobiliare\Datatable')
			->add('get', 'judet-localitate-row-source', 'nomenclatoare/row-source/{id}/{judet_id}', 'JudetController@rows', 'Imobiliare\Datatable')

			/**
		Dezvoltatori
		 **/
			->add('get', 'dezvoltatori-index', 'dezvoltatori', 'DezvoltatoriController@index', 'Imobiliare\Datatable')
			->add('get', 'dezvoltatori-row-source', 'dezvoltatori/{id}', 'DezvoltatoriController@rows', 'Imobiliare\Datatable')

			->add('get', 'dezvoltatori_ansambluri', 'dezvoltatori/{id}/{id_dezvoltator}', 'DezvoltatoriAnsambluriController@index', 'Imobiliare\Datatable')
			->add('get', 'dezvoltatori-ansambluri-row-source', 'dezvoltatori/row-source/{id}/{id_dezvoltator}', 'DezvoltatoriAnsambluriController@rows', 'Imobiliare\Datatable')

			->add('get', 'ansamblu_imobil', 'dezvoltatori/ansambluri-imobile/{id}/{id_ansamblu}', 'AnsambluriImobileController@index', 'Imobiliare\Datatable')
			->add('get', 'ansamblu-imobil-row-source', 'ansambluri-imobile/row-source/{id}/{id_ansamblu}', 'AnsambluriImobileController@rows', 'Imobiliare\Datatable')

			->add('get', 'categorie_imobil', 'dezvoltatori/categorie_imobil/{id}/{id_imobil}', 'ImobilCategorieController@index', 'Imobiliare\Datatable')
			->add('get', 'categorie-imobil-row-source', 'dezvoltatori/categorie-imobil/row-source/{id}/{id_imobil}', 'ImobilCategorieController@rows', 'Imobiliare\Datatable')

			->add('get', 'cladire_imobil', 'dezvoltatori/cladire_imobil/{id}/{id_imobil}', 'CladireImobilController@index', 'Imobiliare\Datatable')
			->add('get', 'cladire_imobil-row-source', 'cladire_imobil/row-source/{id}/{id_imobil}', 'CladireImobilController@rows', 'Imobiliare\Datatable')

			->add('get', 'apartament_imobil', 'dezvoltatori/apartament_imobil/{id}/{id_imobil}', 'ApartamentImobilController@index', 'Imobiliare\Datatable')
			->add('get', 'apartament_imobil-row-source', 'apartament_imobil/row-source/{id}/{id_imobil}', 'ApartamentImobilController@rows', 'Imobiliare\Datatable')

			->add('get', 'teren_imobil', 'dezvoltatori/teren_imobil/{id}/{id_imobil}', 'TerenImobilController@index', 'Imobiliare\Datatable')
			->add('get', 'teren_imobil-row-source', 'teren_imobil/row-source/{id}/{id_imobil}', 'TerenImobilController@rows', 'Imobiliare\Datatable')

//			Ansambluri
			->add('get', 'ansamblu_photo', 'ansamblu-poze/{id}/{id_ansamblu}', 'AnsambluPhotosController@index', 'Imobiliare\Datatable')
			->add('get', 'ansamblu_photo-row-source', 'ansamblu-poze/row-source/{id}/{id_ansamblu}', 'AnsambluPhotosController@rows', 'Imobiliare\Datatable')
			->add('post', 'upload-ansamblu-photo', 'upload-ansamblu-photo/{id_ansamblu}', 'AnsambluPhotosController@upload', 'Imobiliare\Datatable')
			->add('post', 'delete-ansamblu-photo', 'delete-ansamblu-photo', 'AnsambluPhotosController@delete', 'Imobiliare\Datatable')
			->add('get', 'download-ansamblu-document', 'download-ansamblu-document/{document_id}', 'AnsambluPhotosController@download', 'Imobiliare\Datatable')
//			Cladire
			->add('get', 'cladire_apartament', 'cladire-apartamente/{id}/{id_cladire}', 'CladireApartamenteController@index', 'Imobiliare\Datatable')
			->add('get', 'cladire_apartament-row-source', 'cladire-apartamente/row-source/{id}/{id_cladire}', 'CladireApartamenteController@rows', 'Imobiliare\Datatable')
//			poze apartament cladire
			->add('get', 'apartament_cladire_photo', 'apartament-cladire-poze/{id}/{id_apartament}', 'ApartamentCladirePhotosController@index', 'Imobiliare\Datatable')
			->add('get', 'apartament_cladire_photo-row-source', 'apartament-cladire-poze/row-source/{id}/{id_apartament}', 'ApartamentCladirePhotosController@rows', 'Imobiliare\Datatable')
			->add('post', 'upload-apartament-cladire-photo', 'upload-apartament-cladire-photo/{id_cladire}', 'ApartamentCladirePhotosController@upload', 'Imobiliare\Datatable')
			->add('post', 'delete-apartament-cladire-photo', 'delete-apartament-cladire-photo', 'ApartamentCladirePhotosController@delete', 'Imobiliare\Datatable')

			->add('get', 'cladire_photo', 'cladire-poze/{id}/{id_cladire}', 'CladirePhotosController@index', 'Imobiliare\Datatable')
			->add('get', 'cladire_photo-row-source', 'cladire-poze/row-source/{id}/{id_cladire}', 'CladirePhotosController@rows', 'Imobiliare\Datatable')
			->add('post', 'upload-cladire-photo', 'upload-cladire-photo/{id_cladire}', 'CladirePhotosController@upload', 'Imobiliare\Datatable')
			->add('post', 'delete-cladire-photo', 'delete-cladire-photo', 'CladirePhotosController@delete', 'Imobiliare\Datatable')
			->add('get', 'download-cladire-document', 'download-cladire-document/{document_id}', 'CladirePhotosController@download', 'Imobiliare\Datatable')
			/**
		Persoane fizice
		 */

			->add('get', 'clienti-index', 'clienti', 'PrimaCasaController@index', 'Credite\Datatable')
			->add('get', 'persoane-fizice-row-source', 'persoane-fizice/{id}', 'PrimaCasaController@rows', 'Credite\Datatable')
			
			->add('get', 'client-documents', 'client-document/{id}/{id_client}', 'ClientDocumentsController@index', 'Credite\Datatable')
			->add('get', 'client-documents-row-source', 'client_document/row-source/{id}/{id_client}', 'ClientDocumentsController@rows', 'Credite\Datatable')
			->add('post', 'upload-client-documents', 'upload-client-document/{id_client}', 'ClientDocumentsController@upload', 'Credite\Datatable')
			->add('post', 'delete-client-documents', 'delete-client-document', 'ClientDocumentsController@delete', 'Credite\Datatable')
			->add('get', 'download-client-documents', 'download-client-documents/{document_id}', 'ClientDocumentsController@download', 'Credite\Datatable')


			->add('get', 'proprietar-index', 'proprietari', 'ProprietariController@index', 'Imobiliare\Datatable')

			->add('get', 'apartamente_proprietar', 'apartamente_proprietar/{id}/{id_proprietar}', 'ApartamenteProprietarController@index', 'Imobiliare\Datatable')
			->add('get', 'apartamente_proprietar-row-source', 'apartamente_proprietar/row-source/{id}/{id_proprietar}', 'ApartamenteProprietarController@rows', 'Imobiliare\Datatable')
			
			->add('get', 'editare-apartament-gasit', 'proprietari{id}', 'ApartamenteProprietarController@editFindApartament', 'Imobiliare\Datatable')

			->add('get', 'download-apartament-document', 'download-apartament-document/{document_id}', 'ApartamentPhotosController@download', 'Imobiliare\Datatable')

			/**
		END IMOBILE
		 **/

			->add('get', 'cautare-apartamente-index', 'cautare-apartamente', 'CautareApartamenteController@index', 'Apartamente')
			->add('get', 'apartamente-cautare-row-source', 'cautare-apartamente-row-source/{id}', 'CautareApartamenteController@rows', 'Apartamente')
			->add('get', 'apartament-detalii-oferta', 'apartament-detalii-oferta/{id}', 'CautareApartamenteController@showDetails', 'Apartamente')

			->add('get', 'apartament-descarca-pdf', 'apartament-descarca-pdf/{id}', 'CautareApartamenteController@downloadPDF', 'Apartamente')
			->add('get', 'apartament-deschide-pdf', 'apartament-deschide-pdf/{id}', 'CautareApartamenteController@openPDF', 'Apartamente')
			->add('get', 'apartament-descarca-pdf-redus', 'apartament-descarca-pdf-redus/{id}', 'CautareApartamenteController@downloadPDFredus', 'Apartamente')
			->add('get', 'apartament-deschide-pdf-redus', 'apartament-deschide-pdf-redus/{id}', 'CautareApartamenteController@openPDFredus', 'Apartamente')

			->add('post', 'apartamente-load-photo', 'apartamente-load-photo', 'CautareApartamenteController@loadPhoto', 'Apartamente')
			->add('post', 'apartamente-cauta-telefon', 'apartamente-cauta-telefon', 'CautareApartamenteController@searchPhone', 'Apartamente')
			->add('post', 'change_oferta_valabila_endpoint', 'change-oferta-valabila-endpoint', 'CautareApartamenteController@schimbaOfertaValabila', 'Apartamente')
			->add('post', 'change_data_actualizare_endpoint', 'change-data-actualizare-endpoint', 'CautareApartamenteController@schimbaDataActualizare', 'Apartamente')
//Dezvoltatori cautare
			->add('get', 'cautare_dezvoltatori_index', 'cautare_dezvoltatori', 'CautareDezvoltatoriController@index', 'Dezvoltatori')
			->add('get', 'dezvoltatori-cautare-row-source', 'cautare-dezvoltatori-row-source/{id}', 'CautareDezvoltatoriController@rows', 'Dezvoltatori')
			->add('get', 'dezvoltatori-detalii-oferta', 'dezvoltatori-detalii-oferta/{id}', 'CautareDezvoltatoriController@showDetails', 'Dezvoltatori')

			->add('get', 'dezvoltator-deschide-pdf', 'apartament-dezvoltator-deschide-pdf/{id}', 'CautareDezvoltatoriController@openPDF', 'Dezvoltatori')
			->add('get', 'dezvoltator-apartamente-deschide-pdf', 'apartament-dezvoltator-deschide-privat-pdf/{id}', 'CautareDezvoltatoriController@openPDF', 'Dezvoltatori')

			#Apartamente dezvvoltator reports start
			->add('get', 'dezvoltator-apartamente-deschide-pdf', 'apartament-dezvoltator-deschide-pdf/{id}', 'CautareDezvoltatoriController@openPDF', 'Dezvoltatori')
			->add('get', 'dezvoltator-apartamente-descarca-pdf', 'apartament-dezvoltator-descarca-pdf/{id}', 'CautareDezvoltatoriController@downloadPDF', 'Dezvoltatori')
			->add('get', 'dezvoltator-apartamente-deschide-pdf-redus', 'apartament-dezvoltator-deschide-pdf/{id}', 'CautareDezvoltatoriController@openPDFredus', 'Dezvoltatori')
			->add('get', 'dezvoltator-apartamente-descarca-pdf-redus', 'apartament-dezvoltator-descarca-privat-pdf/{id}', 'CautareDezvoltatoriController@downloadPDFredus', 'Dezvoltatori')
			#Apartamente dezvvoltator reports end

			#Cladiri reports start
			->add('get', 'dezvoltator-cladiri-deschide-pdf', 'cladire-deschide-pdf/{id}', 'CladiriReportController@openPDF', 'Dezvoltatori')
			->add('get', 'dezvoltator-cladiri-descarca-pdf', 'cladire-descarca-pdf/{id}', 'CladiriReportController@downloadPDF', 'Dezvoltatori')
			->add('get', 'dezvoltator-cladiri-deschide-pdf-redus', 'cladire-deschide-pdf/{id}', 'CladiriReportController@openPDFredus', 'Dezvoltatori')
			->add('get', 'dezvoltator-cladiri-descarca-pdf-redus', 'cladire-descarca-privat-pdf/{id}', 'CladiriReportController@downloadPDFredus', 'Dezvoltatori')
			#Cladiri reports end
			/**
			AGENTII
			 **/
			->add('get', 'agentii-index', 'agentii', 'AgentiiController@index', 'Agentii')
			->add('get', 'agentii-row-source', 'agentii/{id}', 'AgentiiController@rows', 'Agentii')
		;
	}

	protected function add($method, $name, $uri, $action, $namespace) {
		$record = new \StdClass();
		$record->method = $method;
		$record->name = $name;
		$record->uri = $uri;
		$record->action = $action;
		$record->namespace = $namespace;
		$this->routes[] = $record;
		return $this;
	}

	public static function make() {
		return self::$instance = new Route();
	}

	public function define() {
		foreach ($this->routes as $i => $record) {
			\Route::{ $record->method}(
				$record->uri,
				[
					'as' => $record->name,
					'uses' => ($record->namespace ? $record->namespace . '\\' : '') . $record->action,
				]
			);
		}
	}

}