<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computation extends Model
{
    use HasFactory;

    static $rules = [
		"category_permenkerin_id" => "required",
        "production_result" => "required",
        "product_type" => "required",
        "specification" => "required",
        "brand" => "required"
    ];

    protected $table = "computations";

    protected $fillable = [
        "category_permenkerin_id",
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
    public function category_permenperin(): BelongsTo
    {
        return $this->belongsTo(CategoryPermenperin::class, 'category_permenperin_id', 'id');
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
    public function calculation_results(): HasMany
    {
        return $this->hasMany(CalculationResult::class, 'computation_id', 'id');
    }
}
