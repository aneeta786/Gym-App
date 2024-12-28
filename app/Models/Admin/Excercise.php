<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    use HasFactory;  // Use the trait here
    protected $fillable = [
        'name', 'description', 'image'
    ];
}
