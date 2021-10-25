<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //adding image to post on editor
    protected $fillable = ["title", "file_path", "created_at", "updated_at"];
}
