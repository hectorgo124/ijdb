<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorRoles extends Model
{
    use HasFactory;
    protected $fillable = ['authorid', 'roleid'];
}
