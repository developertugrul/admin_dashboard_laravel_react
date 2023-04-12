<?php

namespace App\Virtual\Resources;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="User resource",
 *     description="User resource",
 *     @OA\Xml(
 *         name="UserResource"
 *     )
 * )
 */
class UserResource
{
    /**
     * @OA\Property(
     *     title="Id",
     *     description="Id of the user",
     *     format="int64",
     *     type="integer",
     *     minimum="1"
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Name of the user",
     *     type="string",
     *     example="Tugrul",
     *     maxLength=100
     * )
     *
     * @var string
     *
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Surname",
     *     description="Surname of the user",
     *     type="string",
     *     example="Yıldırım",
     *     maxLength=100
     * )
     *
     * @var string
     */
    private $surname;

    /**
     * @OA\Property(
     *     title="Username",
     *     description="Username of the user for login",
     *     type="string",
     *     example="tugrulyildirim",
     *     maxLength=30
     * )
     *
     * @var string
     */
    private $username;

    /**
     * @OA\Property(
     *     title="Password",
     *     description="Password of the user",
     *     type="string",
     *     example="MyPassword123",
     *     maxLength=500
     * )
     *
     * @var string
     */
    private $password;

    /**
     * @OA\Property(
     *     title="Phone",
     *     description="Phone number of the user",
     *     type="string",
     *     example="+905312354229",
     *     maxLength=50
     * )
     *
     * @var string
     */
    private $phone;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Email of the user",
     *     type="string",
     *     example="contact[at]tugrulyildirim.com",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="Avatar",
     *     description="Avatar of the user",
     *     type="string",
     *     example="https://tugrulyildirim.com/avatar.png",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $avatar;

    /**
     * @OA\Property(
     *     title="Bio",
     *     description="Biography of the user",
     *     type="string",
     *     example="I am a software developer",
     *     maxLength=1000
     * )
     *
     * @var string
     */
    private $bio;

    /**
     * @OA\Property(
     *     title="Website",
     *     description="Website of the user",
     *     type="string",
     *     example="https://tugrulyildirim.com",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $website;

    /**
     * @OA\Property(
     *     title="Company ID",
     *     description="Company of the user",
     *     format="int64",
     *     type="integer",
     *     minimum="1"
     * )
     *
     * @var int
     */
    private $company_id;

    /**
     * @OA\Property(
     *     title="City",
     *     description="City of the user",
     *     type="string",
     *     example="İstanbul",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $city;

    /**
     * @OA\Property(
     *     title="Country",
     *     description="Country of the user",
     *     type="string",
     *     example="Turkey",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $country;

    /**
     * @OA\Property(
     *     title="Address line 1",
     *     description="First address line of the user",
     *     type="string",
     *     example="İstanbul Turkey",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $address_line_1;

    /**
     * @OA\Property(
     *     title="Address line 2",
     *     description="Second address line of the user",
     *     type="string",
     *     example="İstanbul Turkey",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $address_line_2;

    /**
     * @OA\Property(
     *     title="Address line 3",
     *     description="Third address line of the user",
     *     type="string",
     *     example="İstanbul Turkey",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $address_line_3;

    /**
     * @OA\Property(
     *     title="Postal code",
     *     description="Postal code of the use",
     *     type="string",
     *     example="34000",
     *     maxLength=30
     * )
     *
     * @var string
     */
    private $postal_code;

    /**
     * @OA\Property(
     *     title="State",
     *     description="State of the user",
     *     type="string",
     *     example="İstanbul",
     *    maxLength=255
     * )
     *
     * @var string
     */
    private $state;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Description of the user",
     *     type="string",
     *     example="I am a software developer",
     *    maxLength=1000
     *     )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Balance",
     *     description="Balance of the user",
     *     format="double",
     *     type="double",
     *     example="0.00"
     * )
     *
     * @var double
     */
    private $balance;

    /**
     * @OA\Property(
     *     title="Currency",
     *     description="Default currency of the user",
     *     type="string",
     *     example="TRY",
     *     maxLength=3
     * )
     *
     * @var string
     */
    private $currency;

    /**
     * @OA\Property(
     *     title="Discount",
     *     description="Default discount of the user",
     *     format="double",
     *     type="double",
     *     example="0.00"
     * )
     *
     * @var double
     */
    private $discount;

    /**
     * @OA\Property(
     *     title="Invoice prefix",
     *     description="Default invoice prefix of the user",
     *     type="string",
     *     example="INV-",
     *    maxLength=10
     * )
     *
     * @var string
     */
    private $invoice_prefix;

    /**
     * @OA\Property(
     *     title="Default tax rate",
     *     description="Default tax rate of the user",
     *     format="double",
     *     type="double",
     *     example="18.00"
     * )
     *
     * @var double
     */
    private $default_tax_rate;

    /**
     * @OA\Property(
     *     title="Timezone",
     *     description="Default timezone of the user",
     *     type="string",
     *     example="Europe/Istanbul",
     *     maxLength=255
     * )
     *
     * @var string
     */
    private $timezone;

    /**
     * @OA\Property(
     *     title="Language",
     *     description="Default language of the user",
     *     type="string",
     *     example="tr",
     *    maxLength=7
     * )
     *
     * @var string
     */
    private $language;

    /**
     * @OA\Property(
     *     title="User role list",
     *     description="User role list of the user",
     *     type="string",
     *     example="1,2,3,4,5",
     *     maxLength=1000
     * )
     *
     * @var string
     */
    private $user_roles;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Status of the user",
     *     type="boolean",
     *     example="true"
     * )
     *
     * @var boolean
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Email verified at",
     *     description="Email verified at of the user",
     *     format="date-time",
     *     type="string",
     *     example="2020-01-01 00:00:00"
     * )
     *
     * @var string
     */
    private $email_verified_at;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at of the user",
     *     format="date-time",
     *     type="string",
     *     example="2020-01-01 00:00:00"
     * )
     *
     * @var string
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at of the user",
     *     format="date-time",
     *     type="string",
     *     example="2020-01-01 00:00:00"
     * )
     *
     * @var string
     */
    private $updated_at;
}
