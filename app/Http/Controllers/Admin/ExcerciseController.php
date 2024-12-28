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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
        ]);
        $imagePath = null;
        if($request->hasfile('image')){
            $file = $request->file('image');
            if($file->isValid()){
              $imagePath = $file->store('imagess', 'public');
            }else{}
        }
        Excercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            ]);
            return redirect()->route('admin.excercise.list')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $excercise= Excercise::all();
       return view('Admin.excercise.list' , compact('excercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $excercise = Excercise::findOrFail($id); // Correct the variable name to $blog
        return view('Admin.excercise.edit', compact('excercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
    ]);

    $excercise = Excercise::findOrFail($id);
    if ($request->hasFile('image')) {
        if ($excercise->image && \Storage::disk('public')->exists($excercise->image)) {
            \Storage::disk('public')->delete($excercise->image);
        }
        $imagePath = $request->file('image')->store('images', 'public');
        $excercise->image = $imagePath;
    }
    if ($request->has('name')) {
        $excercise->name = $request->name;
    }

    if ($request->has('description')) {
        $excercise->description = $request->description;
    }

    $excercise->save();

    return redirect()->route('admin.excercise.list')->with('success', 'Exercise updated successfully!');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $excercise = Excercise::findOrFail($id);
         if (file_exists(public_path('storage/' . $excercise->image)) && $excercise->image) {
             unlink(public_path('storage/' . $excercise->image));
         }
         $excercise->delete();
        return redirect()->route('admin.excercise.list')->with('success', 'Banner deleted successfully.');
    }
}
