<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'username',
        'password',
        'phone',
        'email',
        'avatar',
        'bio',
        'website',
        'company_id',
        'top_user_id',
        'city',
        'country',
        'address_line1',
        'address_line2',
        'address_line3',
        'postal_code',
        'state',
        'description',
        'balance',
        'currency',
        'discount',
        'invoice_prefix',
        'timezone',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // findForPassport($username) method is used for authentication
    public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }
}
