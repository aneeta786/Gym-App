<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AssignExcercise;  
use App\Models\Admin\Excercise;
use App\Models\Admin\Members;
use Illuminate\Http\Request;
class AssignExerciseController extends Controller
{
    public function assignExercise(Request $request, $id)
    {
            $request->validate([
                'selected_item' => 'required|exists:exercises,id',
            ]);
            $member = Members::findOrFail($id);
            $exerciseId = $request->selected_item;
            $exercise = Excercise::findOrFail($exerciseId);
            AssignExcercise::create([
                'exercise_id' => $exercise->id,
                'member_id' => $member->id,
                'exercise_name' => $exercise->name,
            ]);
            return redirect()->route('dashboard.excercise.getassignlist')
                ->with('success', 'Exercise assigned successfully!');
       
    }
    public function getassignlist()
    {
            $assignExercises = AssignExcercise::all();
            return view('admin.excercise.get-assign-list', compact('assignExercises'));
        
    }
}
