<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $fillable = [
        "user_id",
        "upgraded_category",
        "payment_method",
        "bank_name",
        "bank_account_number",
        "bank_account_name",
        "transaction_receipt",
        "status",
        "approved_by",
    ];

    protected $guarded = [
        "id"
    ];

    /**
     * Get the user that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the upgraded_category that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function upgraded_category(): BelongsTo
    {
        return $this->belongsTo(UserCategory::class, 'upgraded_category', 'id');
    }

    public static function getOptions() {
        $options = [
            "statuses" => [
                "pending",
                "approved",
                "rejected"
            ],
        ];

        return $options;
    }
}
