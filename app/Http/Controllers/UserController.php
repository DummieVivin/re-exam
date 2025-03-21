<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('project',[
            'projects' => $projects,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required'
        ]);

        $project = Project::create([                                      
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'category' => $validated['category'],
            'user_id' => auth()->id(),

        ]);
        return redirect()->route('project')->with('success', '✨ Data Berhasil Ditambahkan!');
    }

    public function destroy($id){
        $projects = Project::find($id);
        $projects -> delete();
        return redirect()->route('project')->with('success', '✨ Data Berhasil Dihapus!');
    }

    public function edit($id){
        $project = Project::findOrFail($id);
        return view('update', compact('project'));
    }

    public function update(Request $request, $id){
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Archived,Pending,Published',
            'category' => 'required|in:Desktop,Website,Mobile',
            'description' => 'required|string',
        ]);

        // Cari proyek berdasarkan ID
        $project = Project::findOrFail($id);

        // Update data
        $project->update($request->only(['name', 'status', 'category', 'description']));

        // Redirect dengan pesan sukses
        return redirect()->route('project')->with('success', '✨ Project berhasil diperbarui.');
    }


}
