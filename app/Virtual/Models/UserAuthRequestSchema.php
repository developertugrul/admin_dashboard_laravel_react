<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User authentication request model",
 *     description="User authentication request model",
 *     @OA\Xml(
 *         name="UserAuthRequestSchema"
 *     )
 * )
 */
class UserAuthRequestSchema
{
    /**
     * @OA\Property(
     *     title="Username",
     *     description="Username of the user",
     *     type="string",
     *     example="tugrulyildirim"
     * )
     *
     * @var string
     */
    private $username;


    /**
     * @OA\Property(
     *      title="Password",
     *      description="Password for authentication",
     *      example="123456"
     * )
     *
     * @var string
     */
    public $password;

}
