<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalculationResult extends Model
{
    use HasFactory;

    static $rules = [
        "results" => "required",
        "computation_id" => "required"
    ];

    protected $table = "calculation_results";

    protected $fillable = [
        "name",
        "results",
        "computation_id"
    ];

    protected $guarded = [
        "id"
    ];

    protected $casts = [
        "results" => "array"
    ];

    /**
     * Get the computation that owns the CalculationResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function computation(): BelongsTo
    {
        return $this->belongsTo(Computation::class, 'computation_id', 'id');
    }
}
