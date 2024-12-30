<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this import
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;  // Use the trait here
    protected $fillable = [
        'name', 'age', 'email', 'image', 'phone_no', 'address', 'sex', 'is_premium'
    ];
    public function members()
    {
        return $this->belongsToMany(Member::class, 'assign_exercise', 'exercise_id', 'member_id');
    }
}
