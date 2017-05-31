<?php

class PangkatController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pangkat = pangkat::paginate(20);
		$this->layout->content = View::make('pangkat.index')->with('pangkat', $pangkat);
	}

	public function search()
	{
		$pangkat = pangkat::where('golongan','LIKE', '%'.Input::get('keyword').'%')->ppaginate(20);
		$this->layout->content = View::make('pangkat.index')->with('pangkat', $pangkat)->with('keyword', Input::get('keyword'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('pangkat.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
						'golongan'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/pangkat/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pangkat = new pangkat;
			$pangkat->golongan = Input::get('golongan');

			if ($pangkat->save()) 
				return Redirect::to('data/pangkat')->with('message', 'Data pangkat telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/pangkat/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$pangkat = pangkat::find($id);
		$this->layout->content = View::make('pangkat.show')->with('pangkat', $pangkat);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pangkat = pangkat::find($id);
		$this->layout->content = View::make('pangkat.edit')->with('pangkat', $pangkat);
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
						'golongan'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('data/pangkat/'.$id.'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pangkat = pangkat::find($id);
			$pangkat->golongan = Input::get('golongan');

			if ($pangkat->save()) 
				return Redirect::to('data/pangkat')->with('message', 'Data pangkat telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pangkat/'.$id.'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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

			$insert[] = array(
				'nama' => $value["nama"] ,
				
				);
		}

		// return $insert;

		rmdir_recursive($excelpath);
		mkdir($excelpath);
		
		if (sizeof($insert)>0) 
		{
			$save = DB::table('pykmbh_pangkat')->insert($insert);

			if ($save)
				return Redirect::to('data/instansi')->with('message', 'Data berhasil diimport')->with('type', 1);
	
			else
				return Redirect::to('data/instansi')->with('message', 'Kesalahan pada server')->with('type', 2);
		}
		else
			return Redirect::to('data/instansi')->with('message', 'Tidak ada data untuk dimasukan')->with('type', 2);
	}

}
