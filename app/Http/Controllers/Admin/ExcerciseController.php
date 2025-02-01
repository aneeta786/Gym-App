<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Excercise;
class ExcerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.excercise.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    // You can remove this if it's not used.
    public function create()
    {
        // You may not need this since index() handles the view.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
        ]);

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $imagePath = $file->store('images', 'public');
            }
        }

        // Create new exercise
        Excercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.excercise.list')->with('success', 'Exercise created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $excercise = Excercise::all();
        return view('Admin.excercise.list', compact('excercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $excercise = Excercise::findOrFail($id);
        return view('Admin.excercise.edit', compact('excercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
        ]);

        $excercise = Excercise::findOrFail($id);

        // Handle image update
        if ($request->hasFile('image')) {
            if ($excercise->image && \Storage::disk('public')->exists($excercise->image)) {
                \Storage::disk('public')->delete($excercise->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $excercise->image = $imagePath;
        }

        // Update the other fields
        if ($request->has('name')) {
            $excercise->name = $request->name;
        }

        if ($request->has('description')) {
            $excercise->description = $request->description;
        }

        $excercise->save();

        return redirect()->route('dashboard.excercise.list')->with('success', 'Exercise updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $excercise = Excercise::findOrFail($id);

        // Delete the image if it exists
        if ($excercise->image && \Storage::disk('public')->exists($excercise->image)) {
            \Storage::disk('public')->delete($excercise->image);
        }

        // Delete the exercise record
        $excercise->delete();

        return redirect()->route('dashboard.excercise.list')->with('success', 'Exercise deleted successfully.');
    }

    /**
     * Show the form for assigning exercises to members.
     */
    public function assignMembers($id)
    {
        $exlist = Excercise::all();
        return view('admin.excercise.assign-excercise', compact('exlist', 'id'));
    }
}
