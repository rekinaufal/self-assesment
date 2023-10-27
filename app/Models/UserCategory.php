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
        "color" => "required"
    ];

    protected $table = "user_categories";

    protected $fillable = [
        "name",
        "benefits",
        "color"
    ];

    protected $guarded = [
        "id"
    ];

    protected $casts = [
        'benefits' => 'array',
    ];

    public static function getOptions() {
        $options = [
            "colors" => [
                "primary",
                "secondary",
                "warning",
                "danger",
                "info",
                "light",
                "dark"
            ],
        ];

        return $options;
    }
}
