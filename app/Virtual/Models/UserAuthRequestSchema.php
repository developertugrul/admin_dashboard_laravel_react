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
     *     title="id",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="First name of the user",
     *      example="Tuğrul"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Surname",
     *      description="Surname of the user",
     *      example="Yıldırım"
     * )
     *
     * @var string
     */
    public $surname;

    /**
     * @OA\Property(
     *      title="Username",
     *      description="Username for authentication",
     *      example="tugrulyildirim"
     * )
     *
     * @var string
     */
    public $username;

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

    /**
     * @OA\Property(
     *      title="Phone",
     *      description="Phone number of the user",
     *      example="0532 123 45 67"
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="Email",
     *      description="Email address of the user",
     *      example="iletisim[at]tugrulyildirim.com",
     *     format="email"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="Avatar",
     *      description="Avatar of the user",
     *      example="https://tugrulyildirim.com/avatar.jpg"
     * )
     *
     * @var string
     */

    public $avatar;

    /**
     * @OA\Property(
     *      title="Bio",
     *      description="Bio of the user",
     *      example="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vitae ultricies lacinia, nunc nisl aliquet nisl, eget aliquam nisl nisl sit amet lorem. Sed euismod, nisl vitae ultricies lacinia, nunc nisl aliquet nisl, eget aliquam nisl nisl sit amet lorem."
     * )
     *
     * @var string
     */

    public $bio;

    /**
     * @OA\Property(
     *      title="Website",
     *      description="Website of the user",
     *      example="https://tugrulyildirim.com"
     * )
     *
     * @var string
     */

    public $website;


    /**
     * @OA\Property(
     *      title="Company ID",
     *      description="Company ID of the user",
     *      example=1
     * )
     *
     * @var integer
     */

    public $company_id;

    /**
     * @OA\Property(
     *      title="Top User ID",
     *      description="Top User ID of the user",
     *      example=1
     * )
     *
     * @var integer
     */

    public $top_user_id;

    /**
     * @OA\Property(
     *      title="City",
     *      description="City of the user",
     *      example="İstanbul"
     * )
     *
     * @var string
     */

    public $city;

    /**
     * @OA\Property(
     *      title="Country",
     *      description="Country of the user",
     *      example="Türkiye"
     * )
     *
     * @var string
     */

    public $country;

    /**
     * @OA\Property(
     *      title="Address Line 1",
     *      description="Address Line 1 of the user",
     *      example="Kadıköy"
     * )
     *
     * @var string
     */

    public $address_line_1;

    /**
     * @OA\Property(
     *      title="Address Line 2",
     *      description="Address Line 2 of the user",
     *      example="Kadıköy"
     * )
     *
     * @var string
     */

    public $address_line_2;

    /**
     * @OA\Property(
     *      title="Address Line 3",
     *      description="Address Line 3 of the user",
     *      example="Kadıköy"
     * )
     *
     * @var string
     */

    public $address_line_3;

    /**
     * @OA\Property(
     *      title="Postal Code",
     *      description="Postal Code of the user",
     *      example="34732"
     * )
     *
     * @var string
     */

    public $postal_code;

    /**
     * @OA\Property(
     *      title="State",
     *      description="State of the user",
     *      example="İstanbul"
     * )
     *
     * @var string
     */

    public $state;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the user",
     *      example="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vitae ultricies lacinia, nunc nisl aliquet nisl, eget aliquam nisl nisl sit amet lorem. Sed euismod, nisl vitae ultricies lacinia, nunc nisl aliquet nisl, eget aliquam nisl nisl sit amet lorem."
     * )
     *
     * @var string
     */

    public $description;


    /**
     * @OA\Property(
     *      title="Balance",
     *      description="Balance of the user",
     *      example="1000"
     * )
     *
     * @var double
     */

    public $balance;

    /**
     * @OA\Property(
     *      title="Currency",
     *      description="Currency of the user",
     *      example="TRY"
     * )
     *
     * @var string
     */

    public $currency;

    /**
     * @OA\Property(
     *      title="Discount",
     *      description="Discount of the user",
     *      example="10"
     * )
     *
     * @var double
     */

    public $discount;

    /**
     * @OA\Property(
     *      title="Invoice Prefix",
     *      description="Invoice Prefix of the user",
     *      example="INV-2020-"
     * )
     *
     * @var string
     */

    public $invoice_prefix;

    /**
     * @OA\Property(
     *      title="Timezone",
     *      description="Timezone of the user",
     *      example="Europe/Istanbul"
     * )
     *
     * @var string
     */

    public $timezone;

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status of the user",
     *      example="1"
     * )
     *
     * @var boolean
     */

    public $status;

    /**
     * @OA\Property(
     *      title="Created At",
     *      description="Created At of the user",
     *      example="2020-01-01 00:00:00"
     * )
     *
     * @var string
     */

    public $created_at;

    /**
     * @OA\Property(
     *      title="Updated At",
     *      description="Updated At of the user",
     *      example="2020-01-01 00:00:00"
     * )
     *
     * @var string
     */

    public $updated_at;
}
