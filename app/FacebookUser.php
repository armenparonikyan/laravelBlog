<?php

namespace App;


class FacebookUser extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function checkUser($user)
    {
    	if ($fbUser = FacebookUser::where('provider_id',$user->getId())->first()) {
    		return $fbUser->user;
    	}else{
    		$fbUser = FacebookUser::create([
                'provider_id' => $user->getID(),
                'token' => $user->token,
                'user_id' => null
            ]);
            $normUser = User::where('email', $user->getEmail())->first();
            if (!$normUser) {
                $normUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'img' => $user->avatar,
                    'password' => null
                ]);
            }
            $fbUser->user()->associate($normUser)->save();
            return $normUser;
    	}
    }

    public static function checkAndLogIn($user)
    {
    	$fbUser = self::checkUser($user);

        auth()->login($fbUser);
    }
}
