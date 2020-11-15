<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $connection = "mysql";
    protected $table = "posts";

    protected $fillable = [
      "author_id", "post_body"
    ];
}
