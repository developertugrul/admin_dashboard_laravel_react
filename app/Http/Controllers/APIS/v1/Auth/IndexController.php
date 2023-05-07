<?php

namespace App\Http\Controllers\APIS\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;

class IndexController extends Controller
{
    /**
     * @OA\Post(
     *      path="/auth/register",
     *      operationId="register",
     *      tags={"Register a new user"},
     *      summary="Register a new user",
     *      description="Returns the user data, token, status code and message",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserAuthRegisterRequestSchema")
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
            "is_active" => $request->is_active
        ]);
        if ($user->save()) {
            $credentials = request(['username', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'invalid_credentials'
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
                "user_roles" => $user->user_roles
            ], 203);
        } else {
            return response()->json([
                'message' => 'error_creating_user'
            ], 401);
        }
    }

    /**
     * @OA\Post(
     *      path="/auth/login",
     *      operationId="login",
     *      tags={"Login using username and password"},
     *      summary="Login a user",
     *      description="Returns the user data, token, expires_at and token_type",
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
                'message' => 'invalid_credentials'
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
            "user_roles" => $user->user_roles
        ], 203);
    }

    /**
     * @OA\Post(
     *      path="/auth/logout",
     *      operationId="logout",
     *      tags={"Logout the user"},
     *      summary="Logout a user",
     *      security={{"passport": {}},},
     *      description="Returns the status of the operation",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserLogoutRequestSchema")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserLogoutResponseSchema")
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
     *      )
     *     )
     */
    public function logout(Request $request)
    {
        if(!$request->user()){
            return response()->json([
                'message' => 'user_not_found'
            ], 404);
        }
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'logout_success'
        ]);
    }

    /**
     * @OA\Post(
     *     path="/auth/token",
     *     tags={"Check the token is valid"},
     *     summary="Check token",
     *     security={{"passport": {}},},
     *     description="Returns token, status and message",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/UserCheckTokenRequestSchema")
     *     ),
     *     @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\JsonContent(ref="#/components/schemas/UserCheckTokenResponseSchema")
     *     ),
     *     @OA\Response(
     *     response=401,
     *     description="Unauthenticated",
     *     @OA\JsonContent(ref="#/components/schemas/UserCheckTokenResponseSchema")
     *     )
     *   )
     */
    public function checkToken(Request $request)
    {
        if (Auth::check()){
            return response()->json([
                'success' => true,
                'token' => $request->bearerToken(),
                'message' => 'token_is_valid',
                'user' => $request->user()
            ], 200);
        }

        return response()->json([
            'success' => false,
            'token' => $request->bearerToken(),
            'message' => 'Token is invalid',
            'user' => null
        ], 401);
    }

    /**
     * @OA\Post(
     *     path="/auth/authorize",
     *     tags={"Get authorized user data"},
     *     summary="Check if user is logged in",
     *     security={{"passport": {}},},
     *     description="Returns the user data",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/UserAuthorizeRequestSchema")
     *   ),
     *     @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\JsonContent(ref="#/components/schemas/UserAuthorizeResponseSchema")
     *  ),
     *     @OA\Response(
     *     response=401,
     *     description="Unauthenticated",
     *     @OA\JsonContent(ref="#/components/schemas/UserAuthorizeResponseSchema")
     * )
     * )
     *
     */
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

    /**
     * @OA\Post(
     *     path="/auth/change-password",
     *     tags={"Change authorized user's password"},
     *     summary="Check if user is logged in",
     *     security={{"passport": {}},},
     *     description="Returns password change status",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/UserPasswordChangeRequestSchema")
     *   ),
     *     @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *     @OA\JsonContent(ref="#/components/schemas/UserPasswordChangeResponseSchema")
     *  ),
     *     @OA\Response(
     *     response=401,
     *     description="Unauthenticated",
     *     @OA\JsonContent(ref="#/components/schemas/UserPasswordChangeResponseSchema")
     * )
     * )
     *
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            "old_password" => "required",
            "new_password" => "required|confirmed|min:8",
            "confirm_password" => "required|same:new_password"
        ],[
            "old_password.required" => "old_password_required",
            "new_password.required" => "new_password_required",
            "new_password.confirmed" => "new_password_not_match",
            "new_password.min" => "new_password_min_length",
            "confirm_password.required" => "confirm_password_required",
            "confirm_password.same" => "confirm_password_not_match"
        ]);

        $user = $request->user();
        if ($user->password != Hash::make($request->old_password)) {
            return response()->json([
                'success' => false,
                'message' => 'old_password_not_match'
            ], 406);
        }

        if ($user->password == Hash::make($request->new_password)) {
            return response()->json([
                'success' => false,
                'message' => 'new_password_same_as_old'
            ], 406);
        }

        if ($request->new_password != $request->confirm_password) {
            return response()->json([
                'success' => false,
                'message' => 'password_not_match'
            ], 401);
        }

        $user->password = Hash::make($request->new_password);

        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'password_changed'
            ], 204);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'password_not_changed'
            ], 304);
        }
    }

    /**
     * @OA\Post(
     *     path="/auth/token/refresh",
     *     tags={"Refresh token"},
     *     summary="Refresh token",
     *     description="Returns new token",
     *     security={{"passport": {}},},
     *     @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     * )
     *
     */
    public function refreshToken(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken('authToken')->accessToken;

        // set token expiry time
        $user->token()->update([
            'expires_at' => Carbon::now()->addDay()
        ]);

        return response()->json([
            'success' => true,
            'token' => $token,
            'message' => 'token_refreshed'
        ], 200);
    }
}
