<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPost extends Model
{
    use HasFactory;
	
	 protected $fillable = [
        'posttitle',
        'postcontent',
        'author_name',
        'catogory',
        'filename',
    ];
}
