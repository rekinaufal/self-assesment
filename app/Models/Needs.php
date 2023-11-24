<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Needs extends Model
{
    use HasFactory;

    static $rules = [
        "json_needs" => "required",
        "computation_id" => "required"
    ];

    protected $table = "needs";

    protected $fillable = [
        "computation_id",
        "json_needs",
    ];

    protected $guarded = [
        "id"
    ];

    protected $casts = [
        "json_needs" => "array"
    ];

    public function computation(): BelongsTo
    {
        return $this->belongsTo(Computation::class, 'computation_id', 'id');
    }
}
