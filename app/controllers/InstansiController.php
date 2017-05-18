<?php

class InstansiController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$instansi = instansi::all();
		$this->layout->content = View::make('instansi.index')->with('instansi', $instansi);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('instansi.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
						'nama'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/instansi/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$instansi = new instansi;
			$instansi->nama = Input::get('nama');

			if ($instansi->save()) 
				return Redirect::to('data/instansi')->with('message', 'Data instansi telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/instansi/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$instansi = instansi::find($id);
		$this->layout->content = View::make('instansi.show')->with('instansi', $instansi);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$instansi = instansi::find($id);
		$this->layout->content = View::make('instansi.edit')->with('instansi', $instansi);
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
						'nama'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/instansi/'.$id.'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$instansi = instansi::find($id);
			$instansi->nama = Input::get('nama');

			if ($instansi->save()) 
				return Redirect::to('data/instansi')->with('message', 'Data instansi telah diubah')->with('type', 1);
			
			else
				return Redirect::to('data/instansi/'.$id.'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
			return Redirect::to('data/instansi')->with('message', 'Kesalahan saat mengunggah data')->with('type', 2);
		}			

		$datas = Excel::selectSheetsByIndex(0)->load($path.$filename, function($reader){})->get();

		$invaliddata = 0;

		$insert = [];

		foreach ($datas as $key => $value) 
		{
			$valid = 1;
			
			if (is_null($value["nama"])) 
			{
				$valid = 0;
			}

			$insert[] = array('nama' => $value["nama"] );
		}

		// return $insert;

		rmdir_recursive($excelpath);
		mkdir($excelpath);
		
		if (sizeof($insert)>0) 
		{
			$save = DB::table('pykmbh_instansi')->insert($insert);

			if ($save)
				return Redirect::to('data/instansi')->with('message', 'Data berhasil diimport')->with('type', 1);
	
			else
				return Redirect::to('data/instansi')->with('message', 'Kesalahan pada server')->with('type', 2);
		}
		else
			return Redirect::to('data/instansi')->with('message', 'Tidak ada data untuk dimasukan')->with('type', 2);
	}

}
