<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quota extends Model
{
    use HasFactory;

    protected $table = "quotas";

    protected $fillable = [
        "limit_file",
        "price"
    ];

    protected $guarded = [
        "id"
    ];

    /**
     * Get all of the payments for the Quota
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'quota_id', 'id');
    }
}
