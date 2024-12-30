<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignExcercise extends Model
{
    use HasFactory;
    protected $table = 'assign_exercise'; // Optional, if your table name does not follow the convention
    protected $fillable = ['exercise_id', 'member_id', 'exercise_name'];

}
