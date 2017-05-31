<?php

class JabFungsionalController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fungsional = fungsional::paginate(20);
		$this->layout->content = View::make('fungsional.index')->with('fungsional', $fungsional);
	}

	public function search()
	{
		$fungsional = fungsional::where('nama','LIKE', '%'.Input::get('keyword').'%')->paginate(20);
		$this->layout->content = View::make('fungsional.index')->with('fungsional', $fungsional)->with('keyword', Input::get('keyword'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('fungsional.create');
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
						'jenis'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/jabatan-fungsional/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$fungsional = new fungsional;
			$fungsional->nama = Input::get('nama');
			$fungsional->jenis = Input::get('jenis');

			if ($fungsional->save()) 
				return Redirect::to('data/jabatan-fungsional')->with('message', 'Data jabatan fungsional telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/jabatan-fungsional/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$fungsional = fungsional::find($id);
		$this->layout->content = View::make('fungsional.show')->with('fungsional', $fungsional);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$fungsional = fungsional::find($id);
		$this->layout->content = View::make('fungsional.edit')->with('fungsional', $fungsional);
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
						'jenis'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/jabatan-fungsional/'.$id.'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$fungsional = fungsional::find($id);
			$fungsional->nama = Input::get('nama');
			$fungsional->jenis = Input::get('jenis');

			if ($fungsional->save()) 
				return Redirect::to('data/jabatan-fungsional')->with('message', 'Data jabatan fungsional telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/jabatan-fungsional/'.$id.'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
			return Redirect::to('data/jabatan-fungsional')->with('message', 'Kesalahan saat mengunggah data')->with('type', 2);
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
			$save = DB::table('pykmbh_jab_fungsional')->insert($insert);

			if ($save)
				return Redirect::to('data/jabatan-fungsional')->with('message', 'Data berhasil diimport')->with('type', 1);
	
			else
				return Redirect::to('data/jabatan-fungsional')->with('message', 'Kesalahan pada server')->with('type', 2);
		}
		else
			return Redirect::to('data/jabatan-fungsional')->with('message', 'Tidak ada data untuk dimasukan')->with('type', 2);
	}

}
