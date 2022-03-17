<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Str;
use Illuminate\Http\Request;
use App\Models\Social_Provider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function login_with_social($type)
    {
        return Socialite::driver($type)->redirect();
    }
    public function login_callback(Request $request,$type)
    {

        if (! $request->input('code')) {
            return redirect('/')->with('failureMsg','an error');
        }

        try {

            $user = Socialite::driver($type)->stateless()->user();
            $providerId = Social_Provider::where(['provider_id'=> $user['id'],'provider'=>$type])->first();
            if($providerId){

                if ($providerId->user->status == 'active') {
                    Auth::login($providerId->user);
                    return redirect('/');
                }else{
                    return redirect("login")->with('failureMsg','you can\'t logged in, you account deactivate. ');
                }

            }else{

                $createUser = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'] ?? $user['id'],
                    'password' => Hash::make(Str::random(40)),
                ]);

                $social_provider = Social_Provider::create([
                    'user_id' => $createUser->id,
                    'provider_id' => $user['id'],
                    'provider' => $type,
                ]);

                Auth::login($createUser);
                return redirect('/')->with('successMsg','login succesfully');
            }

        } catch (Exception $exception) {
            return redirect()->with('failureMsg','an error');

        }
    }
}
