<?php

namespace App\Virtual\Resources;


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User logout response model",
 *     description="User logout response mode",
 *     @OA\Xml(
 *         name="UserLogoutResponseSchema"
 *     )
 * )
 */
class UserLogoutResponseSchema
{
    /**
     * @OA\Property(
     *     title="Message",
     *     description="Message of the response",
     *     format="boolean",
     *     example="logout_success",
     * )
     *
     * @var string
     */
    private string $success;
}
