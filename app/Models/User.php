<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    static $rules = [
        'fullname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'user_category_id' => 'required',
    ];

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'user_category_id',
    ];

    protected $guarded = [
        "id"
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
        'expired_at' => 'date',
    ];

    /**
     * Get all of the computations for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function computations(): HasMany
    {
        return $this->hasMany(Computation::class, 'user_id', 'id');
    }

    /**
     * Get the user_profile that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_profile(): HasOne
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function user_category(): BelongsTo
    {
        return $this->belongsTo(UserCategory::class, "user_category_id", "id");
    }
}
