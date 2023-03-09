<?php

namespace App\Traits;

trait UserLoginTrait
{
    /**
     * @param $user
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    protected function doLogin($user, $message = '')
    {
        if ($user->tokens()) {
            $user->tokens()->delete();
        }  

        $token = $user->createToken(env('APP_NAME').'-'.date('YYmmddHHiiss'))->plainTextToken;

        return apiResponse([
            'name'=> $user->name,
            'email'=> $user->email, 
            'token'=> 'Bearer '.$token
        ]);
    }
}