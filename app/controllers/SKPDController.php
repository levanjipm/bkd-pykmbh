<?php

class SKPDController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$skpd = SKPD::paginate(20);
		$this->layout->content = View::make('skpd.index')->with('skpd', $skpd);
	}

	public function search()
	{
		$skpd = SKPD::where('nama','LIKE', '%'.Input::get('keyword').'%')->paginate(20);
		$this->layout->content = View::make('skpd.index')->with('skpd', $skpd)->with('keyword', Input::get('keyword'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$skpd = SKPD::all();
		$this->layout->content = View::make('skpd.create')->with('skpd', $skpd);
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
			return Redirect::to('data/skpd/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$skpd = new SKPD;
			$skpd->nama = Input::get('nama');
			$skpd->indukId = Input::get('induk')?Input::get('induk'):null;

			if ($skpd->save()) 
				return Redirect::to('data/skpd')->with('message', 'Data SKPD telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/skpd/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$skpd = SKPD::find($id);
		$struktural = struktural::all();
		$this->layout->content = View::make('skpd.show')->with('skpd', $skpd)->with('struktural', $struktural);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$skpd = SKPD::find($id);
		$induks = SKPD::where('id', '!=', $id)->get();

		$this->layout->content = View::make('skpd.edit')->with('skpd', $skpd)->with('induks', $induks);
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
			return Redirect::to('data/skpd/'.$id.'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			
			$skpd = SKPD::find($id);
			$skpd->nama = Input::get('nama');
			$skpd->indukId = Input::get('induk')?Input::get('induk'):null;

			if ($skpd->save()) 
				return Redirect::to('data/skpd')->with('message', 'Data SKPD telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/skpd/'.$id.'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
			return Redirect::to('data/skpd')->with('message', 'Kesalahan saat mengunggah data')->with('type', 2);
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
			$save = DB::table('skpd')->insert($insert);

			if ($save)
				return Redirect::to('data/skpd')->with('message', 'Data berhasil diimport')->with('type', 1);
	
			else
				return Redirect::to('data/skpd')->with('message', 'Kesalahan pada server')->with('type', 2);
		}
		else
			return Redirect::to('data/skpd')->with('message', 'Tidak ada data untuk dimasukan')->with('type', 2);
	}

	public function jabatan($id)
	{
		$exist = jabatanSKPD::where('skpdId', $id)->where('jabatanId', Input::get('jabatan'))->count();

		if ($exist>0) 
			return Redirect::to('data/skpd/'.$id)->with('message', 'Jabatan telah ada dalam SKPD')->with('type', 3);
		else
		{
			$jab = new jabatanSKPD;
			$jab->skpdId = $id;
			$jab->jabatanId = Input::get('jabatan');
			
			if ($jab->save()) 
				return Redirect::to('data/skpd/'.$id)->with('message', 'Jabatan telah ditambahkan')->with('type', 1);
			else
				return Redirect::to('data/skpd/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2);
		}
	}

}
