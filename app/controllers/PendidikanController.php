<?php

class PendidikanController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pendidikan = pendidikan::all();
		$this->layout->content = View::make('pendidikan.index')->with('pendidikan', $pendidikan);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('pendidikan.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
						'jenis'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/pendidikan/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pendidikan = new pendidikan;
			$pendidikan->jenis = Input::get('jenis');

			if ($pendidikan->save()) 
				return Redirect::to('data/pendidikan')->with('message', 'Data pendidikan telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/pendidikan/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$pendidikan = pendidikan::find($id);
		$this->layout->content = View::make('pendidikan.show')->with('pendidikan', $pendidikan);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pendidikan = pendidikan::find($id);
		$this->layout->content = View::make('pendidikan.edit')->with('pendidikan', $pendidikan);
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
						'jenis'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/pendidikan/'.$id.'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pendidikan = pendidikan::find($id);
			$pendidikan->jenis = Input::get('jenis');

			if ($pendidikan->save()) 
				return Redirect::to('data/pendidikan')->with('message', 'Data pendidikan telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/pendidikan/'.$id.'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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

	public function import()
	{
		$data = Input::file('data');

		$excelpath = public_path().'/uploads/';

		$filename = $data->getClientOriginalName();

		$upload_success = $data->move($path, $filename);	

		if ($upload_success) 
		{
		}
		else
		{
			return Redirect::to('data/pendidikan')->with('message', 'Kesalahan saat mengunggah data')->with('type', 2);
		}			

		$datas = Excel::selectSheetsByIndex(0)->load($path.$filename, function($reader){})->get();

		$invaliddata = 0;

		$insert = [];

		foreach ($datas as $key => $value) 
		{
			$valid = 1;
			
			if (is_null($value["jenis"])) 
			{
				$valid = 0;
			}

			$insert[] = array('jenis' => $value["jenis"] );
		}

		// return $insert;

		rmdir_recursive($excelpath);
		mkdir($excelpath);
		
		if (sizeof($insert)>0) 
		{
			$save = DB::table('pykmbh_pendidikan')->insert($insert);

			if ($save)
				return Redirect::to('data/pendidikan')->with('message', 'Data berhasil diimport')->with('type', 1);
	
			else
				return Redirect::to('data/pendidikan')->with('message', 'Kesalahan pada server')->with('type', 2);
		}
		else
			return Redirect::to('data/pendidikan')->with('message', 'Tidak ada data untuk dimasukan')->with('type', 2);
	}


}
