<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UserLoginTrait;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Post(
 *      path="/api/register",
 *      tags={"Auth"},
 *      summary="Register",
 *      description="Registro de usuario",
 *      @OA\Parameter(
 *          name="Content-Type",
 *          description="application/json",
 *          required=true,
 *          in="header",
 *      ),
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="email", type="email"),
 *              @OA\Property(property="password", type="string"),
 *              @OA\Property(property="name", type="string"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Success",
 *       )
 *  )
 */
class RegisterController extends Controller
{
    use RegistersUsers, UserLoginTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function register(Request $request)
    {
        $user = $this->createUserObject($request);
        return $this->doLogin($user, 'Se ha registrado satisfactoriamente!');
    }

    protected function createUserObject($request)
    {
        $data = $request->all();
        $this->validator($data)->validate();
        $user = $this->create($data);
        return $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ];
        
        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'client_number' => date('YmdHis'),
        ]);
        return $user;
    }
}