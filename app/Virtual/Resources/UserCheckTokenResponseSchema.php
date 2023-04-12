<?php

namespace App\Virtual\Resources;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User check token response model",
 *     description="User check token response model",
 *     @OA\Xml(
 *     name="UserCheckTokenResponseSchema"
 *    )
 * )
 */
class UserCheckTokenResponseSchema
{
    /**
     * @OA\Property(
     *     title="Success",
     *     description="Success",
     *     format="boolean",
     *     example="true"
     * )
     *
     * @var boolean
     */
    private $success;

    /**
     * @OA\Property(
     *     title="token",
     *     description="User token",
     *     format="string",
     *     example="bearer token123..."
     * )
     *
     * @var string
     */

    private $token;

    /**
     * @OA\Property(
     *     title="message",
     *     description="Response message",
     *     format="string",
     *     example="token_is_valid"
     * )
     *
     * @var string
     */

    private $message;
}
