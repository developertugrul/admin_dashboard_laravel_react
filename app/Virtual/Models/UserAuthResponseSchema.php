<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User authentication response model",
 *     description="User authentication response model",
 *     @OA\Xml(
 *         name="UserAuthResponseSchema"
 *     )
 * )
 */
class UserAuthResponseSchema
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
     *     title="id",
     *     description="User ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */

    private $id;

    /**
     * @OA\Property(
     *     title="Username",
     *     description="Username for authentication",
     *     format="string",
     *     example="tugrulyildirim"
     * )
     *
     * @var string
     */
    private $username;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="First name of the user",
     *     format="string",
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
     *     format="string",
     *     example="Yıldırım"
     * )
     *
     * @var string
     */
    private $surname;


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

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Email of the user",
     *     format="string",
     *     example="iletisim[at]tugrulyildirim.com",
     *     nullable=true
     *     )
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="Access Token",
     *     description="Access Token",
     *     format="string",
     *     example="token12313123..."
     *     )
     * )
     *
     * @var string
     */
    private $access_token;

    /**
     * @OA\Property(
     *     title="Token Type",
     *     description="Token Type",
     *     format="string",
     *     example="Bearer"
     *     )
     * )
     *
     * @var string
     */
    private $token_type;

    /**
     * @OA\Property(
     *     title="Expires at",
     *     description="Expires at",
     *     format="int64",
     *     example=3600
     *     )
     * )
     *
     * @var integer
     */
    private $expires_at;

    /**
     * @OA\Property(
     *     title="Is it active?",
     *     description="Is it active?",
     *     format="boolean",
     *     example=true
     *     )
     * )
     *
     * @var boolean
     */

    private $is_active;

    /**
     * @OA\Property(
     *     title="Privileges",
     *     description="All privileges of the user",
     *     format="array",
     *     @OA\Items( type="object", example={"name": "admin", "value": true } ),
     * )
     *
     * @var array
     */

    private $privileges;
}
