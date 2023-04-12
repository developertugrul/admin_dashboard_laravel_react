<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User password change request model",
 *     description="User password change request model",
 *     @OA\Xml(
 *         name="UserPasswordChangeRequestSchema"
 *     )
 * )
 */
class UserPasswordChangeRequestSchema
{
    /**
     * @OA\Property(
     *     title="Old password",
     *     description="Old password",
     *     type="string",
     *     example="123456"
     * )
     *
     * @var string
     */
    private $old_password;

    /**
     * @OA\Property(
     *     title="New password",
     *     description="New password",
     *     type="string",
     *     example="123456"
     * )
     *
     * @var string
     */
    private $new_password;

    /**
     * @OA\Property(
     *     title="Confirm password",
     *     description="Confirm new password",
     *     type="string",
     *     example="123456"
     * )
     *
     * @var string
     */
    private $confirm_password;
}
