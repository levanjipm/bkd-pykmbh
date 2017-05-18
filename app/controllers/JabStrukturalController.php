<?php

class JabStrukturalController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$struktural = struktural::all();
		$this->layout->content = View::make('struktural.index')->with('struktural', $struktural);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$struktural = struktural::all();
		$this->layout->content = View::make('struktural.create')->with('struktural', $struktural);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
						'nama'		=> 'required',
						'eselonhuruf'		=> 'required',
						'eselonangka'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/jabatan-struktural/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$struktural = new struktural;
			$struktural->nama = Input::get('nama');
			$struktural->eselon_angka = Input::get('eselonangka');
			$struktural->eselon_huruf = Input::get('eselonhuruf');
			$struktural->indukId = Input::get('induk')?Input::get('induk'):null;

			if ($struktural->save()) 
				return Redirect::to('data/jabatan-struktural')->with('message', 'Data jabatan struktural telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/jabatan-struktural/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$struktural = struktural::find($id);
		$this->layout->content = View::make('struktural.show')->with('struktural', $struktural);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$struktural = struktural::find($id);
		$this->layout->content = View::make('struktural.edit')->with('struktural', $struktural);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
						'nama'		=> 'required',
						'eselonhuruf'		=> 'required',
						'eselonangka'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/jabatan-struktural/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$struktural = struktural::find($id);
			$struktural->nama = Input::get('nama');
			$struktural->eselon_angka = Input::get('eselonangka');
			$struktural->eselon_huruf = Input::get('eselonhuruf');

			if ($struktural->save()) 
				return Redirect::to('data/jabatan-struktural')->with('message', 'Data jabatan struktural telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/jabatan-struktural/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
