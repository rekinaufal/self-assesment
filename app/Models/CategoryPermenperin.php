<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryPermenperin extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
    ];

    protected $table = "category_permenperins";

    protected $fillable = [
        "name"
    ];

    protected $guarded = [
        "id"
    ];

    /**
     * Get all of the computations for the CategoryPermenperin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function computations(): HasMany
    {
        return $this->hasMany(Computation::class, 'computation_id', 'id');
    }
}
