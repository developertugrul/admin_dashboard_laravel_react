<?php

namespace App\Virtual\Resources;


use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User password change response model",
 *     description="User password change response model",
 *     @OA\Xml(
 *         name="UserPasswordChangeResponseSchema"
 *     )
 * )
 */
class UserPasswordChangeResponseSchema
{
    /**
     * @OA\Property(
     *     title="Message",
     *     description="Message of the response",
     *     type="string",
     *     example="password_change_success"
     * )
     *
     * @var string
     */
    private $message;
    /**
     * @OA\Property(
     *     title="Success",
     *     description="Success of the response",
     *     format="boolean",
     *     type="boolean",
     *     example="true"
     * )
     *
     * @var string
     */
    private $success;
}
