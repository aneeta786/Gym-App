<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Members;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.members.create');
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
            'age' => 'required|integer',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
            'phone_no' => 'required|string',
            'address' => 'required|string',
            'sex' => 'required|in:male,female,other',
            'is_premium' => 'required',
        ]);
        $imagePath = null;
        if($request->hasfile('image')){
            $file = $request->file('image');
            if($file->isValid()){
              $imagePath = $file->store('imagess', 'public');
            }else{}
        }
        Members::create([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'image' => $imagePath,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'sex' => $request->sex,
            'is_premium' => $request->is_premium,
            ]);
            return redirect()->route('admin.member.list')->with('success', 'User created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
       $member= Members::all();
       return view('Admin.members.list' , compact('member'));

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $members = Members::findOrFail($id); // Correct the variable name to $blog
        return view('Admin.members.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'nullable|string',
        'age' => 'nullable|integer',
        'email' => 'nullable|email|unique:members,email,' . $id, 
        'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
        'phone_no' => 'nullable|string',
        'address' => 'nullable|string',
        'sex' => 'nullable|in:male,female,other',
        'is_premium' => 'nullable',
    ]);

    $member = Members::findOrFail($id);
    if ($request->hasFile('image')) {
        if ($member->image && \Storage::disk('public')->exists($member->image)) {
            \Storage::disk('public')->delete($member->image);
        }
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = $member->image;
    }
    $member->update([
        'name' => $request->has('name') ? $request->name : $member->name,
        'age' => $request->has('age') ? $request->age : $member->age,
        'email' => $request->has('email') ? $request->email : $member->email,
        'image' => $imagePath,
        'phone_no' => $request->has('phone_no') ? $request->phone_no : $member->phone_no,
        'address' => $request->has('address') ? $request->address : $member->address,
        'sex' => $request->has('sex') ? $request->sex : $member->sex,
        'is_premium' => $request->has('is_premium') ? $request->is_premium : $member->is_premium,
    ]);

    return redirect()->route('admin.member.list')->with('success', 'Member updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $members = Members::findOrFail($id);
         if (file_exists(public_path('storage/' . $members->image)) && $members->image) {
             unlink(public_path('storage/' . $members->image));
         }
         $members->delete();
        return redirect()->route('admin.member.list')->with('success', 'Banner deleted successfully.');
    }
    
}
