<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PermenperinCategory extends Model
{
    use HasFactory;

    protected $table = "permenperin_categories";

    protected $fillable = ['name'];

    protected $guarded = ["id"];

    /**
     * Get all of the computation for the PermenperinCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function computations(): HasMany
    {
        return $this->hasMany(Computation::class, 'permenperin_category_id', 'id');
    }
}
