<?php
/**
 * Created by PhpStorm.
 * User: szualang
 * Date: 2018-1-25
 * Time: 16:04
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthenticateController extends BaseController
{
    protected $jwt;

    /**
     * AuthenticateController constructor.
     * @param $jwt
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required',
        ]);

        try{
            if (! $token = $this->jwt->attempt($request->only('email', 'password')))
            {
                return response()->json('user_not_fount', 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], 500);
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], 500);
        } catch (JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }

        return response()->json(compact('token'));
    }
}