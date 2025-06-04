<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class MasterController extends Controller
{
    public function index(){
        $tasks = Task::latest()->get();
        return view('tasks.index', ['tasks'=>$tasks]);
    }
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
    
            $formFields=$request->validate([
                'title' => 'required',
                'description' => 'required',
                'due_date' => 'required|date',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            ]);
            
            if ($request->file('image')) {
                $file = $request->file('image');
                $imagename = time(). $file->getClientOriginalName();
                $file->move(public_path('images'), $imagename);
                $formFields['image'] = $imagename;
            }
            Task::create($formFields);
            return redirect()->route('/')->with('success','Record Added Successfully');
    }
    public function edit($id){
        $task = Task::where('id', $id)->first();
        return view('tasks.edit', ['task'=>$task ]);
    }
    public function update($id, Request $request){
        $formFields=$request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $imagename = time(). $file->getClientOriginalName();
            $file->move(public_path('images'), $imagename);
            $formFields['image'] = $imagename;
        }
        Task::where('id',$id)->update($formFields);
        return redirect()->route('/')->with('success','Record Updated Successfully');
    }
    // public function update(Request $request, Task $task)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'due_date' => 'required|date',
    //         'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
    //     ]);
    //     $task->title = $request->title;
    //     $task->description = $request->description;
    //     $task->due_date = $request->due_date;
    //     if ($request->hasFile('image')) {
    //         if ($task->image) {
    //             unlink(public_path('images/'.$task->image));
    //         }
    //         $imageName = time().'.'.$request->image->extension();
    //         $request->image->move(public_path('images'), $imageName);
    //         $task->image = $imageName;
    //     }
    //     $task->save();
    //     return redirect()->route('/');
    // }

    public function destroy($id) {
        $record = Task::where('id', $id)->first();
        if ($record) {
            $imagePath = public_path('uploads/categories_img/' . $record->image ?? '');
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $record->delete();
            return redirect()->route('/')->with('success', 'Record Deleted Successfully.');
        }
        return redirect()->route('/')->with('error', 'Record not found.');
    }

    public function Record_Update($id){
        $record = Task::find($id);
        if($record){
            if($record->is_completed){
                $record->is_completed = 0;
            }else{
                $record->is_completed = 1;
            }
            $record->save();
        }
        return back()->with('success', 'Record Updated Successfully');   
    }
}
