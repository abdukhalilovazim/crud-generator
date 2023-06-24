<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * @OA\Schema(
 *  schema="User",
 *  title="User",
 *  required={"name","surname", "email", "password", "is_active"},
 *   @OA\Property(property="id",type="number"),
 *   @OA\Property(property="name", type="string"),
 *   @OA\Property(property="surname", type="string"),
 *   @OA\Property(property="email", type="string"),
 *   @OA\Property(property="password", type="password"),
 *   @OA\Property(property="is_active", type="boolean"),
 *   @OA\Property(property="phone", type="string"),
 *   @OA\Property(property="created_at",type="date"),
 *   @OA\Property(property="updated_at",type="date"),
 * )
 */
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
