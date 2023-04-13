<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User registiration request model",
 *     description="User registiration request model",
 *     @OA\Xml(
 *         name="UserAuthRegisterRequestSchema"
 *     )
 * )
 */
class UserAuthRegisterRequestSchema
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Name of the user",
     *     type="string",
     *     example="Tuğrul"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Surname",
     *     description="Surname of the user",
     *     type="string",
     *     example="Yıldırım"
     * )
     *
     * @var string
     */
    private $surname;

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
     *     title="Email",
     *     description="Email of the user",
     *     type="string",
     *     example="contact[at]tugrulyildirim.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="Password",
     *     description="Password of the user",
     *     type="string",
     *     example="123456"
     * )
     *
     * @var string
     */
    private $password;

    /**
     * @OA\Property(
     *     title="Password confirmation",
     *     description="Password confirmation of the user",
     *     type="string",
     *     example="123456"
     * )
     *
     * @var string
     */
    private $password_confirmation;
}
