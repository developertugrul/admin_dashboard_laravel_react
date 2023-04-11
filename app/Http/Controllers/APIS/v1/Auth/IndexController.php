<?php

namespace App\Http\Controllers\APIS\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

class IndexController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/v1/auth/register",
     *      operationId="register",
     *      tags={"register"},
     *      summary="Register a new user",
     *      description="Returns the user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserAuthRequestSchema")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserAuthResponseSchema")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=409,
     *          description="Conflict",
     *      )
     *     )
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            "is_active" => $request->is_active,
            "user_type" => 2,
        ]);
        if ($user->save()) {
            $credentials = ['username' => $request->username, 'password' => $request->password]; // get credentials from request
            if (!Auth::attempt($credentials)) { // if login fails
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access'); // create token
            $token = $tokenResult->token; // get token
            $token->expires_at = Carbon::now()->addWeeks(4); // set token expiry
            $token->save(); // save token
            return response()->json([
                'success' => true,
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'surname' => $user->surname,
                'user' => $user,
                'email' => $user->email,
                'access_token' => $tokenResult->accessToken,
                "is_active" => $user->is_active,
                'token_type' => 'Bearer',
                'expires_at' => (int)round(Carbon::parse($tokenResult->token->expires_at)->format('Uu') / pow(10, 6 - 3)),
                "privileges" => $user->privileges
            ], 203);
        } else {
            return response()->json([
                'message' => 'error_creating_user'
            ], 401);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/v1/auth/login",
     *      operationId="login",
     *      tags={"login"},
     *      summary="Login a user",
     *      description="Returns the user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserAuthRequestSchema")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserAuthResponseSchema")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="NotFound",
     *      ),
     *      @OA\Response(
     *          response=409,
     *          description="Conflict",
     *      )
     *     )
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['username', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(4);
        $token->save();
        return response()->json([
            'success' => true,
            'id' => $user->id,
            'username' => $user->username,
            'name' => $user->name,
            'surname' => $user->surname,
            'user' => $user,
            'email' => $user->email,
            'access_token' => $tokenResult->accessToken,
            "is_active" => $user->is_active,
            'token_type' => 'Bearer',
            'expires_at' => (int)round(Carbon::parse($tokenResult->token->expires_at)->format('Uu') / pow(10, 6 - 3)),
            "privileges" => $user->privileges
        ], 203);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout successfully'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function checkToken(Request $request)
    {
        if (Auth::check()){
            return response()->json([
                'success' => true,
                'token' => $request->bearerToken(),
                'message' => 'Token is valid'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'token' => $request->bearerToken(),
            'message' => 'Token is invalid'
        ], 401);
    }


    public function authentication(Request $request)
    {
        $user = [];
        if (Auth::check()) {
            $user = $request->user();
        }
        return response()->json([
            'user' => $user,
            'isLoggedIn' => Auth::check()
        ], 200);
    }
}
