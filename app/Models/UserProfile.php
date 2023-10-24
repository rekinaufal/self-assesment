<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    static $rules = [
        "user_id" => "required",
        "fullname" => "required",
        "company_name" => "required",
        "company_address" => "required",
        "phone_number" => "required|numeric",
        "job_title" => "required"
    ];

    protected $table = "user_profiles";

    protected $fillable = [
        "user_id",
        "fullname",
        "company_name",
        "company_address",
        "phone_number",
        "job_title"
    ];

    protected $guarded = [
        "id"
    ];

    /**
     * Get the user that owns the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
