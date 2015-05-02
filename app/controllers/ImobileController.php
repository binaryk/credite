<?php

class ImobileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /imobiles
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('imobiles.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /imobiles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$localitati = Localitati::lists('denumire','id'); 
		$cartier    = Cartier::all();
		$camere     = TipNrCamere::all();
		$tip_cladire= TipCladire::all();
		$tip_nr_etaje = TipNrEtaje::all();

		return View::make('imobiles.create')->with(
			compact('localitati','cartier','camere','tip_cladire'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /imobiles
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /imobiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /imobiles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /imobiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /imobiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}