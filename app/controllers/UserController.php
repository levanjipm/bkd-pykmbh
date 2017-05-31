<?php

class UserController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::paginate(20);
		$this->layout->content = View::make('user.index')->with('user', $user);
	}

	public function search()
	{
		$user = User::where('email', 'LIKE', '%'.Input::get('keyword').'%')->paginate(20);
		$this->layout->content = View::make('user.index')->with('user', $user)->with('keyword', Input::get('keyword'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'email'		=> 'required|email',
			'password'		=> 'required',
			'cpassword'		=> 'required|same:password',
			'admin'		=> 'required',
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('user/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$user = Sentry::createUser(array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password'),
				'activated' => true,
				));

     // Find the group using the group id
			$adminGroup = Sentry::findGroupByName((Input::get('admin')==1)?'SuperAdmin':'Viewer');

    // Assign the group to the user
			$user->addGroup($adminGroup);

			return Redirect::to('user')->with('message', 'Data user telah ditambahkan')->with('type', 1);
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
		$user = User::all();
		$this->layout->content = View::make('user.index')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::all();
		$this->layout->content = View::make('user.index')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
