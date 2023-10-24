<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    static $rules = [
        "title" => "required",
        "description" => "required",
        "link" => "required|url:http,https",
        "thumbnail" => "required|image"
    ];

    protected $table = "news";

    protected $fillable = [
        "title",
        "description",
        "link",
        "thumbnail"
    ];

    protected $guarded = [
        "id"
    ];
}
