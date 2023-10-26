<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;

    static $rules = [
        "name" => "required|unique:user_categories, name",
        "benefits" => "required",
        "price" => "required|numeric"
    ];

    protected $table = "user_categories";

    protected $fillable = [
        "name",
        "benefits",
        "price"
    ];

    protected $guarded = [
        "id"
    ];

    protected $casts = [
        'benefits' => 'array',
    ];
}
