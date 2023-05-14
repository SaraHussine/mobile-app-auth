<?php

namespace App\Http\Controllers\user\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\ApiTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    use ApiTrait;

    public function login(LoginRequest $request){

      $user = User::where('email', $request->email)->first();

      if(!$user || ! Hash::check($request->password,$user->password)){
          return $this->errorResponse(['email' => 'this record do not found in database'],'wrong email or password',401);
      }
      $user->token = "Bearer ". $user->createToken($request->device_name)->plainTextToken;

      return $this->data(compact('user'),'user information');


    }




    public function logoutCurrentToken(Request $request){

       try{

        $request->user('sanctum')->currentAccessToken()->delete();
        return $this->successResponse('you are logged out');
       }catch(\Exception $e){
          return $this->errorResponse(['faild' => 'something went wrong'],'the user not logout');
       }




    }

    public function logoutAllTokens(Request $request){

        try{

            $request->user('sanctum')->tokens()->delete();
            return $this->successResponse('you are logged out');
           }catch(\Exception $e){
              return $this->errorResponse(['faild' => 'something went wrong'],'the user not logout');
           }


    }


    public function logoutSpecificToken(Request $request){


        try{
            $token = explode("|" ,explode(' ' , $request->header('authorization'))[1])[0];
            $request->user('sanctum')->tokens()->where('id',$token)->delete();
            return $this->successResponse('you are logged from specific token');
           }catch(\Exception $e){
              return $this->errorResponse(['faild' => 'something went wrong'],'the user not logout');
           }

    }


}
