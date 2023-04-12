<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User logout request model",
 *     description="User logout request model",
 *     @OA\Xml(
 *         name="UserLogoutRequestSchema"
 *     )
 * )
 */
class UserLogoutRequestSchema
{
    /**
     * @OA\Property(
     *     title="Token",
     *     description="Token for logout",
     *     format="string",
     *     example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiaXNfYWN0aXZlIjoxLCJ1c2VyX3R5cGUiOjIsImVtYWlsIjoidHVncnVsQGdtYWlsLmNvbSIsInVzZXJuYW"
     * )
     *
     * @var string
     */

    private $token;
}
