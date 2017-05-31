<?php

class BeritaController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$berita = DB::table('berita')->orderBy('created_at', 'desc')->paginate(20);

		$this->layout->content = View::make('berita.index')->with('berita', $berita);
	}

	public function search()
	{
		$berita = DB::table('berita')->where('judul','LIKE', '%'.Input::get('keyword').'%')->orderBy('created_at', 'desc')->paginate(20);

		$this->layout->content = View::make('berita.index')->with('berita', $berita)->with('keyword', Input::get('keyword'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('berita.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
						'judul'		=> 'required',
						'isi'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('berita/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$berita = new berita;
			$berita->judul = Input::get('judul');
			$berita->isi = Input::get('isi');

			if ($berita->save()) 
				return Redirect::to('berita')->with('message', 'Data diklat telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('berita/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$berita = berita::find($id);

		$this->layout->content = View::make("berita.show")->with('berita', $berita);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$berita = berita::find($id);

		$this->layout->content = View::make("berita.edit")->with('berita', $berita);
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
						'judul'		=> 'required',
						'isi'		=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
			return Redirect::to('berita/'.$id/'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$berita = berita::find($id);
			$berita->judul = Input::get('judul');
			$berita->isi = Input::get('isi');

			if ($berita->save()) 
				return Redirect::to('berita')->with('message', 'Data diklat telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('berita/'.$id/'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
