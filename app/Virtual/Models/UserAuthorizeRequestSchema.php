<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User authorisation request model",
 *     description="User authorisation request model",
 *     @OA\Xml(
 *         name="UserAuthorizeRequestSchema"
 *     )
 * )
 */
class UserAuthorizeRequestSchema
{
    /**
     * @OA\Property(
     *     title="Token",
     *     description="Send token in header",
     *     format="string",
     *     example="bearer token123..."
     * )
     *
     * @var string
     */
    private $token;
}
