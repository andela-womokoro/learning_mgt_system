<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:10|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
        ]);
    }

    public function getLogout()
    {
        Auth::logout();
        return view('/auth/login');
    }

    /**
     * Redirect the user to the provider's authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('auth/'.$provider);
        }

        // Facebook API dosen't return a nickname. Compensate for this here
        if($provider == 'facebook') {
            $user->nickname = $user->user['first_name'];
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::loginUsingId($authUser->id, true);

        return redirect($this->redirectTo);
    }

    /**
     * Return user if exists; create and return if doesn't.
     *
     * @param $theUser
     * @return User
     */
    private function findOrCreateUser($theUser, $provider)
    {
        $authUser = User::where('email', $theUser->email)->first();

        if ($authUser) {
            return $authUser;
        }

        if (User::where('username', $theUser->nickname)->first()) {
            $user = factory(User::class)->make([
                'username' => $theUser->nickname,
                'email' => $theUser->email,
                'provider' => $provider,
                'uid' => $theUser->id,
                'avatar_url' => $theUser->avatar,
            ]);
        }

        return User::create([
            'username' => $theUser->nickname,
            'email' => $theUser->email,
            'provider' => $provider,
            'uid' => $theUser->id,
            'avatar_url' => $theUser->avatar,
        ]);
    }
}
