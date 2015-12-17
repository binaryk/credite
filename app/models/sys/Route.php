<?php

namespace Sys;

class Route {

	protected static $instance = NULL;
	protected $routes = [];

	public function __construct() {
		$this
			/* Database general operations */
			->add('get', 'home', '/', 'HomeController@showWelcome', '')
			->add('get', 'lock', 'loock', 'HomeController@lockScreen', '')

			->add('get', 'judet_localitate_index', 'nomenclatoare/{id}/{judet_id}', 'JudetController@index', 'Imobiliare\Datatable')
			->add('get', 'judet-localitate-row-source', 'nomenclatoare/row-source/{id}/{judet_id}', 'JudetController@rows', 'Imobiliare\Datatable')

			->add('get', 'banca_produse', 'banca/{id}/{id_filter}', 'ProduseController@index', 'Credite\Datatable')
			->add('get', 'banca_produse_row_source', 'banca-produse-row-source/{id}/{id_filter}', 'ProduseController@rows', 'Credite\Datatable')

			->add('get', 'conditii_eligibilitate', 'banca-conditii/{id}/{id_filter}', 'EligibilitateController@index', 'Credite\Datatable')
			->add('get', 'conditii_eligibilitate_row_source', 'banca-conditii-row-source/{id}/{id_filter}', 'EligibilitateController@rows', 'Credite\Datatable')

			->add('get', 'dobanzi_comisioane', 'dobanzi-comisioane/{id}/{id_filter}', 'DobanziController@index', 'Credite\Datatable')
			->add('get', 'dobanzi_comisioane_row_source', 'dobanzi-comisioane-row-source/{id}/{id_filter}', 'DobanziController@rows', 'Credite\Datatable')


			->add('get', 'grid-banci', 'banci/row-source/{id}/{judet_id}', 'BanciController@index', 'Credite\Banci')

			->add('get', 'grid_banci', 'banci', 'BanciController@index', 'Banci')
			->add('get', 'grid_banci_source', 'banci/{id}', 'BanciController@rows', 'Banci')



			->add('get', 'documente_necesare_index', 'banca/{id}/documente-necesare/{id_banca}/{type}', 'DocumenteNecesareController@index', 'Credite\Datatable')
			->add('get', 'documente_necesare_row_source', 'banca_documente_necesare/row-source/{id}/{id_filter}/{type}','DocumenteNecesareController@rows', 'Credite\Datatable')
			->add('post','documente_necesare_upload', 'upload-banca-document-necesar/{id_filter}/{type}','DocumenteNecesareController@upload', 'Credite\Datatable')
			->add('post','documente_necesare', 'delete-client-document','documente_necesare@delete', 'Credite\Datatable')
			->add('get', 'documente_necesare', 'download-client-documents/{document_id}','DocumenteNecesareController@download', 'Credite\Datatable')

			->add('get', 'ofertare', 'ofertare', 'OfertaController@index', 'Oferta')

			->add('post', 'r_post_oferte_template', 'r_post_oferte_template', 'OfertaController@template', 'Oferta')
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