<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

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

    public function getThumbnailPath()
    {
        $thumbnailName = $this->thumbnail;
        return  'uploads/' . $thumbnailName;
    }
}
