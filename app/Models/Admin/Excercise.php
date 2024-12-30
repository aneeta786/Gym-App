<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    use HasFactory;

    // Explicitly define the table name if it doesn't follow Laravel's default naming convention
    protected $table = 'exercises';  // Make sure this matches the actual table name in the database

    protected $fillable = [
        'name', 'description', 'image'
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'assign_exercise', 'member_id', 'exercise_id');
    }
}
