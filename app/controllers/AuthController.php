<?php

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login');
	}

	public function store()
	{
		$rules = array(
						'email'	=> 'required',
						'password'	=> 'required'
				      );

        $validation = Validator::make(Input::all(),$rules);

        if ($validation->fails())
		{
		    return $messages = $validation->messages();
		}
		else
		{
			try
            {
                $user = Sentry::authenticate(array(
						    'email'    => Input::get('email'),
						    'password' => Input::get('password'),
						));

                $group = Sentry::findGroupById(1);

                if ($user->inGroup($group))
                {
					return Redirect::to('/');
                }
                else
                {
                	Sentry::logout();
					return Redirect::to('/login')->with('message', 'username/password salah')->with('type', 3);
                }

            }
    //         catch(\Exception $e)
    //         {
				// return Redirect::to('/login')->with('message', 'Email atau password salah')->with('type', 2);
    //         }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    echo 'Login field is required.';
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    echo 'Password field is required.';
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    echo 'Wrong password, try again.';
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    echo 'User was not found.';
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    echo 'User is not activated.';
			}

			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    echo 'User is suspended.';
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    echo 'User is banned.';
			}
		}
	}

	public function destroy()
	{
		Sentry::logout();
		
		return Redirect::to('login');	

	}


}
