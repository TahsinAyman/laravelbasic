<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'age',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    use HasFactory;
}
