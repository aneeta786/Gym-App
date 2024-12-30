<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\AssignExcercise;  // Import the model here
use App\Models\Admin\Excercise;
use App\Models\Admin\Members;
use Illuminate\Http\Request;

class AssignExerciseController extends Controller
{
    public function assignExercise(Request $request, $id)
    {
        $member = Members::findOrFail($id);
        $memberId = $member->id;
        $exerciseId = $request->selected_item;
        $exercise = Excercise::findOrFail($exerciseId);
        $exercisename = $exercise->name;
        $request->validate([
            'selected_item' => 'required|exists:exercises,id',
        ]);
        AssignExcercise::create([
            'exercise_id' => $exerciseId,
            'member_id' => $memberId,
            'exercise_name' =>$exercisename,
        ]);
        return redirect()->route('admin.excercise.getassignlist');

        //return  view('admin.excercise.get-assign-list');
    }
    public function getassignlist() {
        $assignExercises = AssignExcercise::all();  
      
        return view('admin.excercise.get-assign-list', compact('assignExercises'));


    }
    
}
