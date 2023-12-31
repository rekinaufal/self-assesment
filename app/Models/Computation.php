<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Computation extends Model
{
    use HasFactory;

    static $rules = [
		"permenperin_category_id" => "required",
        "production_result" => "required",
        "product_type" => "required",
        "specification" => "required",
        "brand" => "required"
    ];

    protected $table = "computations";

    protected $fillable = [
        "permenperin_category_id",
        "production_result",
        "product_type",
        "specification",
        "brand"
    ];

    protected $guarded = [
        "id",
    ];

    /**
     * Get the category_permenperin that owns the Computation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permenperin_category(): BelongsTo
    {
        return $this->belongsTo(PermenperinCategory::class, 'permenperin_category_id', 'id');
    }

    /**
     * Get the user that owns the Computation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the calculation_results for the Computation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calculation_result(): HasOne
    {
        return $this->hasOne(CalculationResult::class, 'computation_id', 'id');
    }
}
