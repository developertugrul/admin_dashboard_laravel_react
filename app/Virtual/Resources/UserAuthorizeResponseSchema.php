<?php

namespace App\Virtual\Resources;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User authorisation response model",
 *     description="User authorisation response model",
 *     @OA\Xml(
 *         name="UserAuthorizeResponseSchema"
 *     )
 * )
 */
class UserAuthorizeResponseSchema
{
    /**
     * @OA\Property(
     *     title="User",
     *     description="User data",
     *     ref="#/components/schemas/UserResource"
     * )
     *
     * @var \App\Virtual\Resources\UserResource
     */

    private $user;
}
