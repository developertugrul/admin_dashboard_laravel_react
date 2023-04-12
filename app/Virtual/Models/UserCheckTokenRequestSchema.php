<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User check token request model",
 *     description="User check token request model",
 *     @OA\Xml(
 *         name="UserCheckTokenRequestSchema"
 *     )
 * )
 */
class UserCheckTokenRequestSchema
{
    /**
     * @OA\Property(
     *     title="Token",
     *     description="Token for check",
     *     format="string",
     *     example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiaXNfYWN0aXZlIjoxLCJ1c2VyX3R5cGUiOjIsImVtYWlsIjoidHVncnVsQGdtYWlsLmNvbSIsInVzZXJuYW"
     * )
     *
     * @var string
     */

    private $token;
}
