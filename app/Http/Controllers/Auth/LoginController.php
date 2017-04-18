<?php

namespace App\Http\Controllers\Auth;

use App\FacebookUser;
use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->scopes(['user_friends'])->redirect();
    }

    public function handleCallback()
    {
        $user = Socialite::driver('facebook')->user();
        FacebookUser::checkAndLogIn($user);

        $client = new Client();

        $response = $client->get('https://graph.facebook.com/v2.8/' . $user->getId() . '/friends?access_token='. $user->token);
        $data = json_decode($response->getBody());
        
        return redirect()->action('PostController@index', ['data' => $data->data]);
    }
}
