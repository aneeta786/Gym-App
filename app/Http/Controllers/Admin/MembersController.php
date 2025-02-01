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
        // Method left intentionally empty.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
                'name' => 'required|string',
                'age' => 'required|integer',
                'email' => 'required|email|unique:members,email',
                'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
                'phone_no' => 'required|string',
                'address' => 'required|string',
                'sex' => 'required|in:male,female,other',
                'is_premium' => 'required',
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $imagePath = $file->store('images', 'public');
                }
            }

            Members::create([
                'name' => $validated['name'],
                'age' => $validated['age'],
                'email' => $validated['email'],
                'image' => $imagePath,
                'phone_no' => $validated['phone_no'],
                'address' => $validated['address'],
                'sex' => $validated['sex'],
                'is_premium' => $validated['is_premium'],
            ]);

            return redirect()->route('dashboard.member.list')->with('success', 'User created successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $member1 = Members::all();  // Retrieve the first member
         
        return view('Admin.members.list', compact('member1'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $members = Members::findOrFail($id);
            return view('Admin.members.edit', compact('members'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $validated = $request->validate([
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

            $member->update(array_merge($validated, ['image' => $imagePath]));

            return redirect()->route('dashboard.member.list')->with('success', 'Member updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $member = Members::findOrFail($id);

            if ($member->image && \Storage::disk('public')->exists($member->image)) {
                \Storage::disk('public')->delete($member->image);
            }

            $member->delete();

            return redirect()->route('dashboard.member.list')->with('success', 'Member deleted successfully.');
        
    }
}
