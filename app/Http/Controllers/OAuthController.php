<?php
namespace App\Http\Controllers;

use Socialite;
use App\User;
use Illuminate\Contracts\Auth\Registrar;
use \Auth;

class OAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function getIndex()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function getCallback()
    {
        $user = Socialite::driver('facebook')->user();
        //Check if already user
        $cg_user = User::where('email', $user->email)->first();

        if ($cg_user) {
            $cg_user->avatar = $user->avatar;
            $cg_user->save();
            Auth::login($cg_user);
        } //Create new user
        else {

            $cg_user = User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'avatar' => $user->getAvatar()
            ]);
            Auth::login($cg_user);

        }
        return redirect('user');
    }
}