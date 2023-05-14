<?php

namespace App\Http\Controllers\user\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ApiTrait;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */

     use ApiTrait;


    public function __invoke(RegisterRequest $request)
    {
        //

      $data =$request->except(['device_name','password_confirmation']);
      $data['password'] = Hash::make($request->password);
      $user = User::create($data);
      $user->token = 'Bearer ' . $user->createToken($request->device_name)->plainTextToken;

      return $this->data(compact('user'),'user information with tokent :) -- php lovers --');


    }
}
