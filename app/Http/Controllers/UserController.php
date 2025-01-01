<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
     
     $users = User::where('status', 1)->get();
     return view('showdata' ,compact('users'));
    }

   
    public function create()
    {
        return view('userpage');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'contact' => 'required|digits_between:10,15',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 

        ]);

        $file=$request->file('img');
        $destinationPath = public_path('uploades');

        $fileName = time() . '_' . $file->getClientOriginalName();                               
        $file->move($destinationPath, $fileName);
        $validatedData['image'] = 'uploades/' . $fileName;

        User::create($validatedData);
        return redirect()->route('showdata.data')->with('success', 'User details updated successfully!');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('edituser', compact('user'));
    }

   
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'address' => 'required|string|max:500',
            'contact' => 'required|digits_between:10,15',
        ]);
        $user->update($validated);
        return redirect()->route('showdata.data')->with('success', 'User details updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'User details delete successfully!');
    }
}
